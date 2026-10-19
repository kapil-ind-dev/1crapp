<?php
namespace App\Http\Controllers\rms;
use App\Http\Controllers\Controller;
use App\Models\rms\RentCollectionModel;
use App\Models\rms\ShopModel;
use App\Models\rms\RentPayment;
use App\Models\rms\TenantModel;
use App\Models\rms\TenantTenancyModel;
use App\Models\rms\TenantVerificationModel;
use App\Models\rms\TenantDocumentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class DashboardController extends Controller
{
    public function __construct()
    {
    }
    public function dashboard(Request $request)
    {
        // dd('hello');
        $agentId = app('currentAgent')->id ?? 8;
        $tenantSession = Session::get('tenent_login');
        if (!$tenantSession) {
            return redirect()->route('rms.tenant-login');
        }
        $tenantId = $tenantSession['id'];
        // 1. Fetch all active shops assigned to this tenant via approved/active tenancies
        $tenantShops = DB::table('rms_tenant_tenancies as t')
            ->join('rms_shops as s', 's.id', '=', 't.shop_id')
            ->leftJoin('rms_projects as p', 'p.id', '=', 't.project_id')
            ->where('t.tenant_id', $tenantId)
            ->where('t.status', 1)
            ->select(
                't.id as tenancy_id',
                's.id as shop_id',
                's.shop_name',
                's.type as shop_type',
                'p.name as project_name'
            )
            ->get();
        // dd($tenantShops);
        // if ($tenantShops->isEmpty()) {
        //     return redirect()->back()->with('error', 'No active properties/shops assigned to your account.');
        // }
        // 2. Filter Inputs: Shop, Year, Month
        $selectedShopId = $request->filled('shop_id') ? (int) $request->shop_id : 0; // 0 = All Properties
        $selectedYear   = $request->filled('year') ? (int) $request->year : now()->year;
        $selectedMonth  = $request->filled('month') ? (int) $request->month : 0;
        // Current active shop object for banner title
        $activeShop = $selectedShopId > 0 
            ? $tenantShops->firstWhere('shop_id', $selectedShopId) 
            : null;
        // Penalty configurations
        $penaltySettings = DB::table('rms_penalty_setting')
            ->where('agent_id', $agentId)
            ->first();
        $isPenaltyOverride = DB::table('rms_tenant_penalty_override')
            ->where([
                'agent_id'  => $agentId,
                'tenant_id' => $tenantId
            ])
            ->exists();
        // 3. Rent Collections Query (supports all shops or a specific selected shop)
        $query = RentCollectionModel::with(['electricity', 'shop', 'shop.project'])
            ->where('tenant_id', $tenantId)
            ->where('collection_year', $selectedYear);
        if ($selectedShopId > 0) {
            $query->where('shop_id', $selectedShopId);
        } else {
            $query->whereIn('shop_id', $tenantShops->pluck('shop_id')->toArray());
        }
        if ($selectedMonth > 0) {
            $query->where('collection_month', $selectedMonth);
        }
        $collections = $query
            ->orderByDesc('collection_year')
            ->orderByDesc('collection_month')
            ->orderByDesc('id')
            ->get();
        $collectionIds = $collections->pluck('id')->toArray();
        // 4. Payments
        $payments = DB::table('rms_rent_payments')
            ->whereIn('rentcollection_id', $collectionIds ?: [0])
            ->orderByDesc('id')
            ->get();
        $paymentGroups = $payments->groupBy('rentcollection_id');
        $records = collect();
        foreach ($collections as $collection) {
            $electricityAmount = ($collection->shop && $collection->shop->electricity_applicable)
                ? (float) ($collection->electricity->electricity_cost ?? 0)
                : 0;
            $basicRent    = (float) $collection->basic_rent;
            $cleaningCost = (float) $collection->cleaning_cost;
            $otherCharge  = (float) $collection->other_charge;
            $baseAmount = $basicRent + $cleaningCost + $electricityAmount + $otherCharge;
            $collectionPayments = $paymentGroups->get($collection->id, collect());
            $approvedAmount = (float) $collectionPayments
                ->where('approval_status', 1)
                ->sum('payment_amount');
            $pendingAmount = (float) $collectionPayments
                ->where('approval_status', 0)
                ->sum('payment_amount');
            $rejectedAmount = (float) $collectionPayments
                ->where('approval_status', 2)
                ->sum('payment_amount');
            $penalty = 0;
            if (!$isPenaltyOverride && $penaltySettings) {
                $dueDate = $collection->shop->due_day ?? null;
                $penaltyBase = max(0, $baseAmount - $approvedAmount);
                if (function_exists('calculateRentPenalty')) {
                    $penalty = calculateRentPenalty(
                        $penaltyBase,
                        $dueDate,
                        $penaltySettings,
                        $collection->collection_year,
                        $collection->collection_month
                    );
                }
            }
            $totalDue = $baseAmount + $penalty;
            $outstanding = max(0, $totalDue - $approvedAmount);
            $records->push([
                'id'              => $collection->id,
                'shop_id'         => $collection->shop_id,
                'shop_name'       => $collection->shop->shop_name ?? ('Shop #' . $collection->shop_id),
                'project_name'    => $collection->shop->project->name ?? '-',
                'year'            => $collection->collection_year,
                'month'           => $collection->collection_month,
                'month_name'      => date('F', mktime(0, 0, 0, $collection->collection_month, 1)),
                'basic_rent'      => $basicRent,
                'cleaning_cost'   => $cleaningCost,
                'other_charge'    => $otherCharge,
                'electricity'     => $electricityAmount,
                'base_amount'     => $baseAmount,
                'penalty'         => $penalty,
                'total_due'       => $totalDue,
                'approved_amount' => $approvedAmount,
                'pending_amount'  => $pendingAmount,
                'rejected_amount' => $rejectedAmount,
                'outstanding'     => $outstanding,
                'status'          => (int) $collection->status,
                'created_at'      => $collection->created_at,
                'payments'        => $collectionPayments,
            ]);
        }
        $totals = [
            'total_due'         => $records->sum('total_due'),
            'total_paid'        => $records->sum('approved_amount'),
            'total_pending'     => $records->sum('pending_amount'),
            'total_penalty'     => $records->sum('penalty'),
            'total_outstanding' => $records->sum('outstanding'),
            'total_requests'    => $records->count(),
        ];
        // 5. Recent Payments Query
        $recentPaymentsQuery = DB::table('rms_rent_payments as p')
            ->join('rms_rentcollection as r', 'r.id', '=', 'p.rentcollection_id')
            ->leftJoin('rms_shops as s', 's.id', '=', 'p.shop_id')
            ->where('p.tenant_id', $tenantId)
            ->where('r.collection_year', $selectedYear);
        if ($selectedShopId > 0) {
            $recentPaymentsQuery->where('p.shop_id', $selectedShopId);
        } else {
            $recentPaymentsQuery->whereIn('p.shop_id', $tenantShops->pluck('shop_id')->toArray());
        }
        if ($selectedMonth > 0) {
            $recentPaymentsQuery->where('r.collection_month', $selectedMonth);
        }
        $recentPayments = $recentPaymentsQuery
            ->select(
                'p.*',
                's.shop_name',
                'r.collection_year',
                'r.collection_month'
            )
            ->orderByDesc('p.id')
            ->limit(10)
            ->get();
        // Available Distinct Years
        $years = RentCollectionModel::where('tenant_id', $tenantId)
            ->select('collection_year')
            ->distinct()
            ->orderByDesc('collection_year')
            ->pluck('collection_year');
        if (!$years->contains($selectedYear)) {
            $years->prepend($selectedYear);
        }
        $statusLabels = [
            0 => 'Pending Request',
            1 => 'Request Sent',
            2 => 'Partially Paid',
            3 => 'Fully Paid',
            4 => 'Overdue',
            5 => 'Cancelled',
        ];
        $statusColors = [
            0 => 'bg-g-dark',
            1 => 'bg-g-blue',
            2 => 'bg-g-orange',
            3 => 'bg-g-green',
            4 => 'bg-g-pink',
            5 => 'bg-g-grey',
        ];
        return view('rms.pages.dashboard', compact(
            'tenantSession',
            'tenantShops',
            'activeShop',
            'selectedShopId',
            'selectedYear',
            'selectedMonth',
            'years',
            'records',
            'totals',
            'recentPayments',
            'statusLabels',
            'statusColors'
        ));
    }
    public function my_payments(Request $request)
    {
        $agent_id = app('currentAgent')->id ?? 8;
        $tenantSession = Session::get('tenent_login');
        if (!$tenantSession) {
            return redirect()->route('rms.tenant-login');
        }
        $tenantId = $tenantSession['id'];
        // 1. Fetch all active shops assigned to this tenant
        $tenantShops = DB::table('rms_tenant_tenancies as t')
            ->join('rms_shops as s', 's.id', '=', 't.shop_id')
            ->leftJoin('rms_projects as p', 'p.id', '=', 't.project_id')
            ->where('t.tenant_id', $tenantId)
            ->where('t.status', 1)
            ->select(
                't.id as tenancy_id',
                's.id as shop_id',
                's.shop_name',
                's.account_id',
                'p.name as project_name'
            )
            ->get();
        if ($tenantShops->isEmpty()) {
            return redirect()->back()->with('error', 'No active properties/shops linked to your profile.');
        }
        // 2. Filter by Shop (0 = All Properties)
        $selectedShopId = $request->filled('shop_id') ? (int) $request->shop_id : 0;
        $shopIds = $selectedShopId > 0 
            ? [$selectedShopId] 
            : $tenantShops->pluck('shop_id')->toArray();
        // 3. Payment Requests (Unpaid, Partial, Overdue)
        $requestLists = RentCollectionModel::with(['electricity', 'shop.project', 'shop'])
            ->where('tenant_id', $tenantId)
            ->whereIn('shop_id', $shopIds)
            ->whereIn('status', [0, 1, 2, 4, 5])
            ->orderByDesc('id')
            ->paginate(10, ['*'], 'requests_page')
            ->withQueryString();
        // 4. Completed Payments
        $completedLists = RentCollectionModel::with(['electricity', 'shop.project', 'shop'])
            ->withSum([
                'payments as approved_payment_amount' => function ($query) {
                    $query->where('approval_status', 1);
                }
            ], 'payment_amount')
            ->where('tenant_id', $tenantId)
            ->whereIn('shop_id', $shopIds)
            ->where('status', 3)
            ->orderByDesc('id')
            ->paginate(10, ['*'], 'completed_page')
            ->withQueryString();
        // 5. Fetch bank/UPI accounts for all tenant shops (mapped by shop_id)
        $shopAccountMap = DB::table('rms_shops as s')
            ->leftJoin('rms_accounts as a', 'a.id', '=', 's.account_id')
            ->whereIn('s.id', $tenantShops->pluck('shop_id')->toArray())
            ->select(
                's.id as shop_id',
                's.shop_name',
                'a.account_holder_name',
                'a.bank_name',
                'a.account_no',
                'a.ifsc_code',
                'a.account_type',
                'a.upi_id',
                'a.upi_name',
                'a.barcode_file'
            )
            ->get()
            ->keyBy('shop_id');
        // Default account for initial load
        $activeAccount = $selectedShopId > 0
            ? ($shopAccountMap->get($selectedShopId) ?? null)
            : ($shopAccountMap->first() ?? null);
        $penaltySettings = DB::table('rms_penalty_setting')
            ->where('agent_id', $agent_id)
            ->first();
        $isPenaltyOverride = DB::table('rms_tenant_penalty_override')
            ->where([
                'agent_id'  => $agent_id,
                'tenant_id' => $tenantId
            ])
            ->exists();
        return view('rms.pages.my-payments', compact(
            'requestLists',
            'completedLists',
            'tenantShops',
            'selectedShopId',
            'shopAccountMap',
            'activeAccount',
            'penaltySettings',
            'isPenaltyOverride'
        ));
    }
    public function payment_history($id)
    {
        $agentId = app('currentAgent')->id ?? 8;
        $tenantSession = Session::get('tenent_login');
        if (!$tenantSession) {
            return response()->json([
                'status'  => false, 
                'message' => 'Tenant session expired.'
            ], 401);
        }
        $tenantId = $tenantSession['id'];
        // 1. Fetch collection ensuring it belongs to this tenant and an active tenancy
        $collection = RentCollectionModel::with(['electricity', 'shop'])
            ->where('id', $id)
            ->where('tenant_id', $tenantId)
            ->whereHas('shop.tenancies', function ($q) use ($tenantId) {
                $q->where('tenant_id', $tenantId)
                ->where('status', 1);
            })
            ->first();
        if (!$collection) {
            return response()->json([
                'status'  => false, 
                'message' => 'Payment request not found or unauthorized.'
            ], 404);
        }
        // 2. Penalty configuration & exemptions
        $penaltySettings = DB::table('rms_penalty_setting')
            ->where('agent_id', $agentId)
            ->first();
        $isPenaltyOverride = DB::table('rms_tenant_penalty_override')
            ->where([
                'agent_id'  => $agentId,
                'tenant_id' => $tenantId
            ])
            ->exists();
        // 3. Base Amount Calculations
        $electricityAmount = ($collection->shop && $collection->shop->electricity_applicable)
            ? (float) ($collection->electricity->electricity_cost ?? 0)
            : 0;
        $basicRent    = (float) $collection->basic_rent;
        $cleaningCost = (float) $collection->cleaning_cost;
        $otherCharge  = (float) ($collection->other_charge ?? 0);
        $baseAmount = $basicRent + $cleaningCost + $electricityAmount + $otherCharge;
        // 4. Fetch all payment submissions for this collection
        $payments = DB::table('rms_rent_payments')
            ->where('rentcollection_id', $collection->id)
            ->orderByDesc('id')
            ->get();
        $approvedAmount = (float) $payments->where('approval_status', 1)->sum('payment_amount');
        $pendingAmount  = (float) $payments->where('approval_status', 0)->sum('payment_amount');
        // 5. Penalty Calculation
        $penalty = 0;
        if (!$isPenaltyOverride && $penaltySettings) {
            $dueDate     = $collection->shop->due_day ?? null;
            $penaltyBase = max(0, $baseAmount - $approvedAmount);
            if (function_exists('calculateRentPenalty')) {
                $penalty = calculateRentPenalty(
                    $penaltyBase,
                    $dueDate,
                    $penaltySettings,
                    $collection->collection_year,
                    $collection->collection_month
                );
            }
        }
        $totalDue    = $baseAmount + $penalty;
        $outstanding = max(0, $totalDue - $approvedAmount);
        return response()->json([
            'status'     => true,
            'collection' => [
                'id'               => $collection->id,
                'shop_id'          => $collection->shop_id,
                'shop_name'        => $collection->shop->shop_name ?? ('Shop #' . $collection->shop_id),
                'gross_due'        => $totalDue,
                'base_amount'      => $baseAmount,
                'basic_rent'       => $basicRent,
                'cleaning_cost'    => $cleaningCost,
                'other_charge'     => $otherCharge,
                'electricity'      => $electricityAmount,
                'penalty'          => $penalty,
                'paid_amount'      => $approvedAmount,
                'pending_amount'   => $pendingAmount,
                'outstanding'      => $outstanding,
                'collection_year'  => $collection->collection_year,
                'collection_month' => $collection->collection_month,
            ],
            'payments'   => $payments
        ]);
    }
    public function my_property(Request $request)
    {
        $tenantSession = Session::get('tenent_login');
        if (!$tenantSession) {
            return redirect()->route('rms.tenant-login');
        }
        $tenantId = $tenantSession['id'];
        $agent_id = app('currentAgent')->id ?? 8;
        // 1. Fetch all active properties leased by this tenant
        $tenantProperties = DB::table('rms_tenant_tenancies as t')
            ->join('rms_shops as s', 's.id', '=', 't.shop_id')
            ->leftJoin('rms_projects as p', 'p.id', '=', 't.project_id')
            ->where('t.tenant_id', $tenantId)
            ->where('t.status', 1)
            ->select(
                't.id as tenancy_id',
                't.monthly_rent as tenancy_rent',
                't.movein_date',
                't.onboarding_status',
                's.id as shop_id',
                's.shop_name',
                's.type as shop_type',
                's.cleaning_cost',
                's.electricity_applicable',
                's.due_day',
                'p.name as project_name'
            )
            ->get();
        if ($tenantProperties->isEmpty()) {
            return redirect()->back()->with('error', 'No active properties/shops linked to your profile.');
        }
        // 2. Determine active property
        $selectedShopId = $request->filled('shop_id') 
            ? (int) $request->shop_id 
            : (int) $tenantProperties->first()->shop_id;
        $activeProperty = $tenantProperties->firstWhere('shop_id', $selectedShopId) 
            ?? $tenantProperties->first();
        // 3. Penalty settings & overrides
        $penalty = DB::table('rms_penalty_setting')->where('agent_id', $agent_id)->first();
        $isPenaltyOverride = DB::table('rms_tenant_penalty_override')
            ->where([
                'agent_id'  => $agent_id,
                'tenant_id' => $tenantId
            ])
            ->exists();
        // 4. Rent Collections Totals for the active property
        $totals = DB::table('rms_rentcollection')
            ->selectRaw('
                SUM(basic_rent + cleaning_cost + other_charge) as total_gross_due,
                SUM(paid_amount) as total_paid_amount,
                SUM(basic_rent + cleaning_cost + other_charge - paid_amount) as outstanding_balance
            ')
            ->where('tenant_id', $tenantId)
            ->where('shop_id', $activeProperty->shop_id)
            ->first();
        // 5. Fetch latest electricity cost using your existing RentCollectionModel relation (SAFE)
        $latestElectricity = null;
        if ($activeProperty->electricity_applicable) {
            $latestCollection = RentCollectionModel::with('electricity')
                ->where('tenant_id', $tenantId)
                ->where('shop_id', $activeProperty->shop_id)
                ->orderByDesc('collection_year')
                ->orderByDesc('collection_month')
                ->first();
            $latestElectricity = $latestCollection->electricity ?? null;
        }
        return view('rms.pages.my-property', compact(
            'tenantSession',
            'tenantProperties',
            'activeProperty',
            'penalty',
            'isPenaltyOverride',
            'totals',
            'latestElectricity'
        ));
    }
    public function save_rent(Request $request)
    {
        $agentId = app('currentAgent')->id??8;
        $tenant = Session::get('tenent_login');
        if (!$tenant) {
            return response()->json([
                'status' => false,
                'message' => 'Tenant session expired.'
            ], 401);
        }
        $request->validate([
            'collection_id' => 'required|integer',
            'paid_amount' => 'required|numeric|min:0.01',
            'payment_mode' => 'required|string|max:50',
            'reference_number' => 'nullable|string|max:255',
            'payment_date' => 'required|date',
            'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'remarks' => 'nullable|string|max:1000',
        ]);
        DB::beginTransaction();
        try {
            
            $collection = DB::table('rms_rentcollection')
                ->where('id', $request->collection_id)
                ->where('tenant_id', $tenant['id'])
                ->lockForUpdate()
                ->first();
            if (!$collection) {
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => 'Payment request not found.'
                ], 404);
            }
            
            if (in_array((int) $collection->status, [3, 5])) {
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => (int) $collection->status === 3
                        ? 'This payment request is already fully paid.'
                        : 'This payment request has been cancelled.'
                ], 422);
            }
            
            $approvedAmount = (float) DB::table('rms_rent_payments')
                ->where('rentcollection_id', $collection->id)
                ->where('approval_status', 1)
                ->sum('payment_amount');
            $pendingAmount = (float) DB::table('rms_rent_payments')
                ->where('rentcollection_id', $collection->id)
                ->where('approval_status', 0)
                ->sum('payment_amount');
            
                
            $remainingAmount = max(
                0,
                (float) $collection->gross_due
                - $approvedAmount
                - $pendingAmount
            );
            $paymentAmount = (float) $request->paid_amount;
            
            $paymentProof = null;
            if($request->hasFile('payment_proof')) {
                $proofName = $this->set_logoname(
                    time() . '_' . $request->payment_proof->getClientOriginalName()
                );
                $request->payment_proof->move(public_path('uploads'), $proofName);
                $paymentProof = asset('uploads/' . $proofName);
            }
            
            $penaltySettings = DB::table('rms_penalty_setting')->where('agent_id', $agentId)->first();
            $subgross = (float)$collection->basic_rent +
            (float)($this->electricityTotal($collection->id) ?? 0) +
            (float)($collection->cleaning_cost ?? 0) +
            (float)($collection->other_charge ?? 0) - $collection->paid_amount;
            $penalty = calculateRentPenalty(
                $subgross-$collection->paid_amount,
                $collection->shop->due_day ?? null,
                $penaltySettings,
                $collection->collection_year,
                $collection->collection_month
            );
            $shop = ShopModel::select('id', 'shop_name', 'account_id')->where('agent_id', $agentId)
            ->find($collection->shop_id);
            $paymentId = DB::table('rms_rent_payments')->insertGetId([
                'rentcollection_id' => $collection->id,
                'tenant_id' => $collection->tenant_id,
                'account_id' => $shop->account_id,
                'shop_id' => $collection->shop_id,
                'payment_amount' => $paymentAmount,
                'penalty_amount' => $penalty,
                'payment_mode' => $request->payment_mode,
                'reference_number' => $request->reference_number,
                'payment_date' => $request->payment_date,
                /*
                * 0 = Pending Approval
                */
                'approval_status' => 0,
                'approved_by' => null,
                'approved_at' => null,
                'receipt' => null,
                'payment_proof' => $paymentProof,
                'remarks' => $request->remarks,
                'rejection_reason' => null,
                'agent_id' => $collection->agent_id,
                'created_by' => Auth::id(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $grossAmount = $subgross+$penalty-$paymentAmount;
            if ((int) $collection->status === 0) {
                DB::table('rms_rentcollection')
                ->where('id', $collection->id)
                ->update([
                    'gross_due' => $grossAmount,
                    'status' => 1,
                    'updated_at' => now(),
                ]);
            }
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Payment submitted successfully and sent for administrator approval.',
                'payment_id' => $paymentId
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Unable to submit payment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    private function electricityTotal($collection_id){
       return DB::table('rms_electricity_bill')->where('collection_id', $collection_id)->value('electricity_cost');
    }
    public function profile(){
        $user = Session::get('tenent_login');
        $tenant = TenantModel::find($user['id']);
        return view('rms.pages.profile', compact('tenant'));
    }
    public function updateProfile(Request $request)
    {
        $user = Session::get('tenent_login');
        $tenant = TenantModel::find($user['id']);
        // Uniqueness is checked only when the value is actually being changed,
        // and only inside the same project. This avoids false errors when the
        // same person has more than one tenant row (e.g. multiple shops).
        $emailRules = ['required', 'email', 'max:255'];
        if ($request->email !== $tenant->email) {
            $emailRules[] = Rule::unique('rms_tenants', 'email')
                ->where('project_id', $tenant->project_id)
                ->ignore($tenant->id);
        }
        $mobileRules = ['required', 'digits:10'];
        if ($request->mobile !== $tenant->mobile) {
            $mobileRules[] = Rule::unique('rms_tenants', 'mobile')
                ->where('project_id', $tenant->project_id)
                ->ignore($tenant->id);
        }
        $data = $request->validate([
            'name'   => ['required', 'string', 'max:255'],
            'email'  => $emailRules,
            'mobile' => $mobileRules,
        ]);
        // Profile image: upload new / remove existing
        if ($request->hasFile('profile')) {
            $this->deleteProfileFile($tenant->profile);
            $file     = $request->file('profile');
            $fileName = 'tenant_' . $tenant->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/tenant_profiles'), $fileName);
            $data['profile'] = asset('uploads/tenant_profiles/' . $fileName);
        } elseif ($request->boolean('remove_profile')) {
            $this->deleteProfileFile($tenant->profile);
            $data['profile'] = null;
        } else {
            unset($data['profile']); // keep the existing image
        }
        $tenant->update($data);
        return redirect()->route('rms.profile')
            ->with('success', 'Profile updated successfully.');
    }
    private function deleteProfileFile(?string $path): void
    {
        if ($path && file_exists(public_path($path))) {
            @unlink(public_path($path));
        }
    }
    public function change_pin(){
        return view('rms.pages.pin');
    }
    public function updatePin(Request $request)
    {
        $user = Session::get('tenent_login');
        $tenant = TenantModel::find($user['id']);
        $request->validate([
            'current_pin' => ['required', 'digits:4'],
            'pin'         => ['required', 'digits:4', 'confirmed', 'different:current_pin'],
        ], [
            'pin.different' => 'New PIN must be different from the current PIN.',
        ]);
        // Supports both hashed and plain-text stored PINs
        $stored = (string) $tenant->pin;
        $isHashed = password_get_info($stored)['algoName'] !== 'unknown';
        $valid  = $isHashed
            ? Hash::check($request->current_pin, $stored)
            : hash_equals($stored, $request->current_pin);
        if (! $valid) {
            return back()->withErrors(['current_pin' => 'Current PIN is incorrect.']);
        }
        // If your login compares the PIN as plain text, use $request->pin instead of Hash::make(...)
        $tenant->update(['pin' => $request->pin, 'password'=>Hash::make($request->pin)]);
        return redirect()->route('rms.pin')
            ->with('success', 'PIN updated successfully.');
    }
    public function editPayment($id)
    {
        try {
            $payment = RentPayment::findOrFail($id);
            // Fetch collection using the correct foreign key
            $collection = RentCollectionModel::with([
                'shop',
                'payments',
                'electricity'
            ])->find($payment->rentcollection_id);
            $collectionData = null;
            if ($collection) {
                $basicRent   = (float) ($collection->basic_rent ?? 0);
                $maintenance = (float) ($collection->shop?->cleaning_cost ?? 0);
                $otherCharge = (float) ($collection->other_charge ?? 0);
                $electricity = (float) (
                    $collection->electricity?->electricity_cost ?? 0
                );
                // Calculate gross due
                $grossDue = (float) (
                    $collection->gross_due
                    ?? (
                        $basicRent +
                        $maintenance +
                        $otherCharge +
                        $electricity
                    )
                );
                // Sum approved payments
                $approvedPaid = (float) $collection->payments
                    ->where('approval_status', 1)
                    ->sum('payment_amount');
                // Outstanding amount
                $remainingAmount = max(
                    0,
                    $grossDue - $approvedPaid
                );
                $collectionData = [
                    'id'               => $collection->id,
                    'collection_year'  => $collection->collection_year,
                    'collection_month' => $collection->collection_month,
                    'gross_due'        => $grossDue,
                    'approved_paid'    => $approvedPaid,
                    'remaining_amount' => $remainingAmount,
                ];
            }
            return response()->json([
                'status'     => true,
                'data'       => $payment,
                'collection' => $collectionData,
            ]);
        } catch (\Exception $e) {
            \Log::error('Edit rent payment error', [
                'payment_id' => $id,
                'message'    => $e->getMessage(),
            ]);
            return response()->json([
                'status'  => false,
                'message' => 'Unable to fetch payment details.',
            ], 500);
        }
    }
    /**
     * Update payment record.
     */
    public function updatePayment(Request $request, $id)
    {
        $request->validate([
            'paid_amount'      => 'required|numeric|min:0.01',
            'payment_date'     => 'required|date',
            'payment_mode'     => 'required|string|max:50',
            'reference_number' => 'nullable|string|max:255',
            'receipt'          => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'remarks'          => 'nullable|string|max:1000',
        ]);
        try {
            DB::beginTransaction();
            $payment = RentPayment::findOrFail($id);
            // Amount field mapping (DB column payment_amount / paid_amount)
            $payment->payment_amount   = $request->paid_amount;
            $payment->payment_date     = $request->payment_date;
            $payment->payment_mode     = $request->payment_mode;
            $payment->reference_number = $request->reference_number;
            $payment->remarks          = $request->remarks;
            $payment->approval_status  = 0;
            // Agar user ne naya proof/receipt upload kiya ho
            if ($request->hasFile('receipt')) {
                $directory = public_path('uploads');
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true);
                }
                $file = $request->file('receipt');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($directory, $fileName);
                $payment->payment_proof =  asset('uploads/' . $fileName);
            }
            $payment->save();
            DB::commit();
            return response()->json([
                'status'        => true,
                'collection_id' => $payment->rent_collection_id,
                'message'       => 'Payment record updated successfully.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => false,
                'message' => 'Failed to update payment: ' . $e->getMessage()
            ], 500);
        }
    }
}