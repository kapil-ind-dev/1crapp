<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use App\Models\SubscriptionPlan;
use App\Models\PlanFeature;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\UserWallet;
use App\Models\CouponModel;

use App\Models\PlanTypeModel;
use App\Models\CdbFeature;
use App\Models\CdbPlanModel;
use App\Models\CdbPlanFeature;
use App\Models\CdbTransactionModel;

use App\Mail\BecomeAgent;
use App\Models\LeadMagnetModel;
use App\Models\LeadMagenetModel1;

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


class SubscriptionController extends Controller
{
    
    public function price(){
        $user = Auth()->user();
        $plan_type = PlanTypeModel::where('status', 1)->orderBy('total_days', 'ASC')->get();
        $cdb_plans = CdbPlanModel::where(['status' => 1, 'agent_id'=>app('currentAgent')->id])->orderBy('id', 'ASC')->get();
        $c_feature = CdbFeature::all();
        $have_cdb_plan = 0;
        $active_user_plan = null;
        if(!is_null($user->package_id)){
            $active_user_plan = CdbPlanModel::select('id', 'monthly_price')->where(['id'=>$user->package_id, 'status' => 1, 'agent_id'=>app('currentAgent')->id])->first();
            $have_cdb_plan = 1;
        }
        // dd($user);
        $plans = SubscriptionPlan::where(['status' => 1])->orderBy('priority', 'ASC')->get();
        $features = PlanFeature::all();
        $have_any_plan=1; 
        $is_active_plan=1;
        $active_agent_plan = null;
        $agent = DB::table('agents')->where('email', $user->email)->first();
        if ($agent) {
           $have_any_plan=2; 
           if (empty($agent->valid_upto) || Carbon::parse($agent->valid_upto)->isPast()) {
                
            }else{
                $active_agent_plan = SubscriptionPlan::select('id', 'monthly_price')->where(['id'=>$agent->package_id, 'status' => 1])->first();
                $is_active_plan=2;
            }
        }
        // dd($active_agent_plan);
        return view('web.pages.price', compact('plans','features','have_any_plan', 'is_active_plan', 'active_agent_plan', 'agent', 'cdb_plans','c_feature','have_cdb_plan','plan_type','active_user_plan','user'));
    }
    public function checkout(Request $request)
    {
        // dd(Auth()->user());
        $plan_for = $request->plan_for;

        // Common validation
        $request->validate([
            'plan_type' => 'required|integer|exists:plan_type,id',
            'plan_for'  => 'required|in:adb,cdb',
        ]);
        
        // Conditional validation
        if ($plan_for === 'adb') {
            $request->validate([
                'plan_id' => 'required|integer|exists:subscription_plans,id',
            ]);
        } else {
            $request->validate([
                'plan_id' => 'required|integer|exists:cdb_plans,id',
            ]);
        }
        if ($plan_for == 'adb') {
            $plan = SubscriptionPlan::where(['status' => 1, 'id' => $request->plan_id])->firstOrFail();
        } else {
            $plan = CdbPlanModel::where(['status' => 1, 'agent_id'=>app('currentAgent')->id, 'id' => $request->plan_id])->firstOrFail();
        }
        // dd($plan);
        $plan_type = PlanTypeModel::where(['status' => 1, 'id' => $request->plan_type])->firstOrFail();
        // Base price for selected duration
        $basePrice = $plan->monthly_price * $plan_type->total_months;
        // Discount
        $discountPercent = $plan_type->discount ?? 0;
        $discountAmount = ($basePrice * $discountPercent) / 100;
    
        // Final payable amount
        $finalPrice = round($basePrice - $discountAmount);
    
        return view('web.pages.checkout', compact(
            'plan',
            'plan_type',
            'basePrice',
            'discountAmount',
            'plan_for',
            'finalPrice'
        ));
    }
    public function create_order(Request $request)
    {
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));
    
        $amount = $request->amount; // paise
    
        $order = $api->order->create([
            'receipt' => uniqid(),
            'amount' => $amount,
            'currency' => 'INR'
        ]);
    
        return response()->json([
            'order_id' => $order->id,
            'amount' => $amount
        ]);
    }
    public function upgrade_plan(Request $request)
    {
    
        $user = Auth()->user();
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));
        DB::beginTransaction();
        try {
            // ðŸ”¹ Verify signature
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];
    
            $api->utility->verifyPaymentSignature($attributes);
    
            // ðŸ”¹ Fetch payment
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            // dd($payment);
            if($payment->status != 'captured'){
                $payment = $payment->capture(['amount' => $payment->amount]);
            }
            $amount = $payment->amount / 100;
            $plan_id = $request->plan_id;
            $plan_type_id = $request->plan_type;
            $plan = SubscriptionPlan::find($plan_id);
            $planType = PlanTypeModel::find($plan_type_id);
            if(!$plan || !$planType){
                throw new \Exception("Invalid Plan");
            }
            $agent = DB::table('agents')->where('email',$user->email)->first();
    
            // calculate validity
            // $validUpto = Carbon::now();
            // $remainingDays = 0;
            // if($agent && $agent->valid_upto && Carbon::parse($agent->valid_upto)->isFuture()){
            //     $validUpto = Carbon::parse($agent->valid_upto);
            //     $remainingDays = Carbon::now()->diffInDays($validUpto);
            // }
            
            // $currentPlanType = PlanTypeModel::find($agent->package_type_id);
            // $current_plan = SubscriptionPlan::find($agent->package_id);
            // $currentPlanPerDayPrice = $current_plan->amount/$current_plan->total_days;
            // if($current_plan->amount < $plan->amount){
            //     if($remainingDays > 0){
                    
            //     }
            // }
    
            // $validUpto->addDays($planType->total_days);
            $validUpto = Carbon::now();
            $remainingDays = 0;
            $totalDays = 0;
            if ($agent && $agent->valid_upto && Carbon::parse($agent->valid_upto)->isFuture()) {
                $validUpto = Carbon::parse($agent->valid_upto);
                $remainingDays = Carbon::now()->diffInDays($validUpto);
                $current_plan = SubscriptionPlan::find($agent->package_id);
                // dd('Current:'.$current_plan->monthly_price, 'Upgrade:'.$plan->monthly_price);
                if (!is_null($current_plan) && $current_plan->monthly_price <= $plan->monthly_price) {
                    $currentPlanPerDayPrice = $current_plan->monthly_price / 30;
                    if ($remainingDays > 0) {
                        // remaining value of old plan
                        $remainingAmount = $remainingDays * $currentPlanPerDayPrice;
                        // per day price of new plan
                        $newPlanPerDay = $plan->monthly_price / 30;
                        // extra days from remaining value
                        $extraDays = floor($remainingAmount / $newPlanPerDay);
                        // total validity
                        $totalDays = $planType->total_days + $extraDays;
                        $validUpto = Carbon::now()->addDays($totalDays);
                        // dd('Total Days: '.$totalDays, 'Valid Upto:'.$validUpto, 'Remaining Amount'.$remainingAmount);
                    } else {
                        $validUpto = Carbon::now()->addDays($planType->total_days);
                    }
                } else {
                    $validUpto = Carbon::now()->addDays($planType->total_days);
                }
            }else{
                $validUpto = Carbon::now()->addDays($planType->total_days);
            }
            
            //  dd($remainingDays,$currentPlanPerDayPrice,  $validUpto, $totalDays);
            // ðŸ”¹ create agent if not exist
            if(!$agent){
    
                $agentId = DB::table('agents')->insertGetId([
                    'subdomain'=>Str::slug($user->name),
                    'first_name'=>$user->name,
                    'email'=>$user->email,
                    'mobile_number'=>$user->mobile,
                    'role_id'=>2,
                    'status'=>1,
                    'password'=>$user->password,
                    'package_id'=>$plan_id,
                    'package_type_id'=>$plan_type_id,
                    'valid_upto'=>$validUpto,
                    'created_at'=>now()
                ]);
    
            }else{
    
                $agentId = $agent->id;
    
                DB::table('agents')
                ->where('id',$agentId)
                ->update([
                    'package_id'=>$plan_id,
                    'package_type_id'=>$plan_type_id,
                    'valid_upto'=>$validUpto,
                    'updated_at'=>now()
                ]);
            }
    
            // ðŸ”¹ save payment
            Payment::create([
                'user_id'=>$agentId,
                'plan_id'=>$plan_id,
                'plan_type'=>$plan_type_id,
                'r_payment_id'=>$payment->id,
                'method'=>$payment->method,
                'currency'=>$payment->currency,
                'user_email'=>$payment->email,
                'coupon_id'=>$request->coupon_id,
                'coupon_code'=>$request->coupon_code,
                'coupon_discount_type'=>$request->coupon_discount_type,
                'coupon_discount_amount'=>$request->coupon_discount_amount,
                'total_amount'=>$request->total_amount,
                'plan_discount'=>$request->plan_discount,
                'amount'=>$amount,
                'json_response'=>json_encode($payment),
                'created_at'=>now()
            ]);
    
            // ðŸ”¹ save subscription
            Subscription::create([
                'user_id'=>$agentId,
                'plan_type'=>$plan_type_id,
                'plan'=>$plan_id,
                'product'=>$plan->title,
                'amount'=>$amount,
                'reference_no'=>$payment->id,
                'payment_mode'=>$payment->method,
                'created_at'=>now()
            ]);
            if (!DB::table('tbl_core_pages')->where(['page_type'=> 'index', 'created_by' => $agentId])->exists()) {
                DB::table('tbl_core_pages')->insert([
                    'page_type'   => 'index',
                    'page_name'   => 'Index Page',
                    'slug'        => Str::slug('Index Page'),
                    'layout'      => 1,
                    'access_type' => 'pre',
                    'status'      => 1,
                    'created_by'  => $agentId,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
            
            if (!DB::table('tbl_core_pages')->where(['page_type'=> 'home-page', 'created_by' => $agentId])->exists()) {
                DB::table('tbl_core_pages')->insert([
                    'page_type'   => 'home-page',
                    'page_name'   => 'Home Page',
                    'slug'        => Str::slug('Home Page'),
                    'layout'      => 1,
                    'access_type' => 'post',
                    'status'      => 1,
                    'created_by'  => $agentId,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
            if (!DB::table('cdb_plans')->where(['is_free'=> 1, 'agent_id' => $agentId])->exists()) {
                DB::table('cdb_plans')->insert([
                    'agent_id'      => $agentId,
                    'title'         => 'Free',
                    'monthly_price' => 0,
                    'yearly_price'  => 0,
                    'discount'      => 0,
                    'status'        => 1,
                    'is_free'       => 1,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
    
            DB::commit();
    
            return redirect()->route('thank-you')->with('success','Plan Upgraded successfully');
    
        }catch(SignatureVerificationError $e){
            dd($e->getMessage());
            DB::rollBack();
            return back()->with('error','Payment verification failed');
    
        }
        catch(\Throwable $e){
            dd($e->getMessage());
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }
    
    // Upgrade CDB Plans
    public function upgrade_cdb_plan(Request $request)
    {
        $user = Auth()->user();
    
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));
    
        if (!empty($request->razorpay_payment_id)) {
    
            DB::beginTransaction();
    
            try {
                
                // ðŸ”¹ Verify Razorpay Signature
                $attributes = [
                    'razorpay_order_id'   => $request->razorpay_order_id,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature'  => $request->razorpay_signature
                ];
    
                $api->utility->verifyPaymentSignature($attributes);
    
                // ðŸ”¹ Fetch Payment
                $payment = $api->payment->fetch($request->razorpay_payment_id);
    
                // ðŸ”¹ Capture Payment if not captured
                if ($payment->status != 'captured') {
                    $payment = $payment->capture(['amount' => $payment->amount]);
                }
    
                $description = explode('||', $payment['description']);
                $plan_name = $description[0];
                $plan_id = $request->plan_id;
                $plan_type_id = $request->plan_type;
                $amount = $payment['amount'] / 100;
                $planType = PlanTypeModel::find($plan_type_id);
                $subscription_plan = CdbPlanModel::find($plan_id);
                // ðŸ”¹ Get user again
                $userData = DB::table('users')->where('email', $user->email)->first();
    
                // $validUpto = Carbon::now();
                // if ($userData->valid_upto && Carbon::parse($userData->valid_upto)->isFuture()) {
                //     $validUpto = Carbon::parse($userData->valid_upto);
                // }
                // $validUpto->addDays($planType->total_days);
                // ----------------------------upgrade plan functionality-------------------------------
                    $validUpto = Carbon::now();
                    $remainingDays = 0;
                    $totalDays = 0;
                     if ($userData->valid_upto && Carbon::parse($userData->valid_upto)->isFuture()) {
                        $validUpto = Carbon::parse($userData->valid_upto);
                        $remainingDays = Carbon::now()->diffInDays($validUpto);
                    }
                   
                    // $currentPlanType = PlanTypeModel::find($userData->package_type_id);
                    $current_plan = CdbPlanModel::find($userData->package_id);
                    if ($current_plan && $current_plan->monthly_price < $subscription_plan->monthly_price) {
                        $currentPlanPerDayPrice = $current_plan->monthly_price / 30;
                        if ($remainingDays > 0) {
                            // remaining value of old plan
                            $remainingAmount = $remainingDays * $currentPlanPerDayPrice;
                            // per day price of new plan
                            $newPlanPerDay = $subscription_plan->monthly_price / 30;
                            // extra days from remaining value
                            $extraDays = floor($remainingAmount / $newPlanPerDay);
                            // total validity
                            $totalDays = $planType->total_days + $extraDays;
                            $validUpto = Carbon::now()->addDays($totalDays);
                        } else {
                            $validUpto = Carbon::now()->addDays($planType->total_days);
                        }
                    } else {
                        $validUpto = Carbon::now()->addDays($planType->total_days);
                    }
                // ----------------------------upgrade plan functionality-------------------------------
                // ðŸ”¹ Update user plan
                DB::table('users')
                    ->where('id', $userData->id)
                    ->update([
                        'valid_upto' => $validUpto,
                        'package_id' => $plan_id,
                        'package_type_id' => $planType->id,
                        'updated_at' => now(),
                    ]);
    
                // ðŸ”¹ Save transaction
                CdbTransactionModel::create([
                    'user_id' => $userData->id,
                    'txn_id' => 'TXNCDB' . rand(11111111, 99999999),
                    'razorpay_id' => $payment['id'],
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'plan_id' => $plan_id,
                    'plan_type' => $planType->id,
                    'plan_duration' => $validUpto,
                    'payment_mode' => $payment['method'],
                    'user_email' => $payment['email'],
                    'currency' => $payment['currency'],
                    'status' => 1,
                    'coupon_id'=>$payment->coupon_id,
                    'coupon_code'=>$payment->coupon_code,
                    'coupon_discount_type'=>$payment->coupon_discount_type,
                    'coupon_discount_amount'=>$payment->coupon_discount_amount,
                    'total_amount'=>$payment->total_amount,
                    'plan_discount'=>$payment->plan_discount,
                    'amount' => $amount,
                    'json_response' => json_encode((array)$payment),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    
                DB::commit();
    
            }catch (SignatureVerificationError $e) {
    
                DB::rollBack();
                return redirect()->back()->with('error', 'Payment verification failed.');
    
            } 
            catch (\Throwable $e) {
    
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return redirect()->back()->with('success', 'Subscription Plan upgraded successfully!');
    }
    

    public function coupon_apply(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'plan_for' => 'required|in:adb,cdb'
        ]);
    
        // Determine booking type
        $booking_type_id = ($request->plan_for == 'adb') ? 2 : 1;
    
        // Find coupon
        $coupon = CouponModel::with('bookingTypes')
            ->where('code', strtoupper(trim($request->code)))
            ->where('status', 1)
            ->first();
    
        if (!$coupon) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid promo code.'
            ]);
        }
    
        $today = Carbon::today();
    
        // Coupon start date
        if ($coupon->valid_from && $today->lt(Carbon::parse($coupon->valid_from))) {
            return response()->json([
                'status' => false,
                'message' => 'Promo code is not active yet.'
            ]);
        }
    
        // Coupon expiry
        if ($coupon->expires_on && $today->gt(Carbon::parse($coupon->expires_on))) {
            return response()->json([
                'status' => false,
                'message' => 'Promo code has expired.'
            ]);
        }
    
        // Validate booking type
        if ($coupon->applies_specific_booking) {
    
            $allowed = $coupon->bookingTypes()
                ->where('booking_type_id', $booking_type_id)
                ->exists();
    
            if (!$allowed) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid promo code.'
                ]);
            }
        }
    
        // Check usage limit
        // if (!empty($coupon->usage_limit)) {
    
        //     $usedCount = DB::table('tbl_coupon_usage')
        //         ->where('coupon_id', $coupon->id)
        //         ->count();
    
        //     if ($usedCount >= $coupon->usage_limit) {
        //         return response()->json([
        //             'status' => false,
        //             'message' => 'Promo code usage limit has been reached.'
        //         ]);
        //     }
        // }
        
        $subtotal = $request->subtotal; // Pass this from AJAX
        
        if ($coupon->discount_type == 'percent') {
            $discount = ($subtotal * $coupon->discount_value) / 100;
        } elseif ($coupon->discount_type == 'fixed') {
            $discount = $coupon->discount_value;
        } else {
            $discount = $subtotal; // Free
        }
        
        $grandTotal = max(0, $subtotal - $discount);
        
        return response()->json([
            'status' => true,
            'message' => 'Promo code applied successfully.',
            'coupon_id' => $coupon->id,
            'discount_type' => $coupon->discount_type,
            'discount_value' => $coupon->discount_value,
            'discount' => round($discount, 2),
            'grand_total' => round($grandTotal, 2)
        ]);
    }
    public function thankyou(){
        return view('web.pages.thankyou');
    }
    
}