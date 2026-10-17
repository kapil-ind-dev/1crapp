<?php
namespace App\Http\Controllers\rms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\rms\TenantModel;
use App\Models\rms\TenantTenancyModel;
use App\Models\rms\TenantVerificationModel;
use App\Models\rms\TenantDocumentModel;

class TenantController extends Controller
{

    /**
     * Form to update tenancy formalities/documents (when incomplete or corrections needed)
     */
    public function editTenancy($id)
    {
        $user = Session::get('tenent_login');
        if (!$user) {
            return redirect()->route('rms.tenant-login');
        }

        $tenancy = TenantTenancyModel::with(['shop', 'project', 'verification', 'tenant.documents'])
            ->where('tenant_id', $user['id'])
            ->findOrFail($id);

        return view('rms.pages.complete-tenancy', compact('tenancy'));
    }

    /**
     * Save Tenancy Documentation & Formalities
     */
    public function updateTenancy(Request $request, $id)
    {
        $user = Session::get('tenent_login');
        $tenancy = TenantTenancyModel::with('verification')
            ->where('tenant_id', $user['id'])
            ->findOrFail($id);

        $request->validate([
            'identity_proof'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'pan_card'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'address_proof'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'employment_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'police_status'    => 'nullable|in:Not started,Applied,Under process,Completed',
            'police_ref'       => 'nullable|string|max:100',
            'police_file'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'agreement_status' => 'nullable|in:Not started,Draft prepared,Sent for signing,Executed',
            'agreement_date'   => 'nullable|date',
            'agreement_file'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            // 'rwa_method'       => 'nullable|string|max:50',
            // 'rwa_file'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $uploadHelper = function ($key, $folder = 'tenant_docs') use ($request) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/' . $folder), $filename);
                return asset('uploads/' . $folder . '/' . $filename);
            }
            return null;
        };

        // 1. Update Core KYC Documents (rms_tenant_documents)
        $docData = [];
        if ($request->hasFile('identity_proof'))   $docData['identity_proof'] = $uploadHelper('identity_proof', 'tenant_identities');
        if ($request->hasFile('pan_card'))         $docData['pan_card'] = $uploadHelper('pan_card', 'tenant_pan');
        if ($request->hasFile('address_proof'))    $docData['address_proof'] = $uploadHelper('address_proof', 'tenant_addresses');
        if ($request->hasFile('employment_proof')) $docData['employment_proof'] = $uploadHelper('employment_proof', 'tenant_employment');

        if (!empty($docData)) {
            TenantDocumentModel::updateOrCreate(['tenant_id' => $user['id']], $docData);
        }

        // 2. Update Lease Verification & Proofs (rms_tenant_verifications)
        $verifData = [
            'tenant_id'        => $user['id'],
            'tenancy_id'       => $tenancy->id,
            'police_status'    => $request->police_status ?? 'Not started',
            'police_ref'       => $request->police_ref,
            'agreement_status' => $request->agreement_status ?? 'Not started',
            'agreement_date'   => $request->agreement_date,
            // 'rwa_method'       => $request->rwa_method,
            'details_accurate' => $request->has('details_accurate') ? 1 : 0,
        ];

        if ($request->hasFile('police_file'))    $verifData['police_file'] = $uploadHelper('police_file', 'tenant_police');
        if ($request->hasFile('agreement_file')) $verifData['agreement_file'] = $uploadHelper('agreement_file', 'tenant_agreements');
        // if ($request->hasFile('rwa_file'))       $verifData['rwa_file'] = $uploadHelper('rwa_file', 'tenant_rwa');

        TenantVerificationModel::updateOrCreate(['tenancy_id' => $tenancy->id], $verifData);

        // Reset status to 'Submitted' if it was returned for corrections
        if (in_array($tenancy->onboarding_status, ['Corrections Required', 'Owner Returned'])) {
            $tenancy->update(['onboarding_status' => 'Submitted']);
        }

        return redirect()->route('rms.profile')->with('success', 'Tenancy documents and formalities submitted successfully.');
    }
    /**
     * Show verification screen or the edit form if already verified
     */
    public function publicOnboardView($token)
    {
        $tenancy = TenantTenancyModel::with([
            'tenant.documents',
            'shop',
            'project',
            'verification'
        ])->where('onboarding_token', $token)->firstOrFail();
        // Check 1: Time-based expiration
        if ($tenancy->onboarding_token_expires_at && now()->greaterThan($tenancy->onboarding_token_expires_at)) {
            return view('rms.pages.token-expired', [
                'message' => 'This onboarding link expired on ' . \Carbon\Carbon::parse($tenancy->onboarding_token_expires_at)->format('d M, Y') . '. Please contact your property manager to regenerate the link.'
            ]);
        }
        // Check if agent is already verified for this token
        $isVerified = Session::get('agent_verified_token_' . $token, false);

        // Check if lease is already approved & locked
        $isLocked = in_array($tenancy->onboarding_status, ['Approved for Move-In', 'Owner Approve']);

        return view('rms.pages.public-standalone-onboard', compact('tenancy', 'token', 'isVerified', 'isLocked'));
    }

    /**
     * Verify agent mobile or email
     */
    public function publicVerifyAgent(Request $request, $token)
    {
        $request->validate([
            'agent_credential' => 'required|string',
        ]);

        $tenancy = TenantTenancyModel::where('onboarding_token', $token)->firstOrFail();

        $input       = trim(strtolower($request->agent_credential));
        $savedMobile = trim(strtolower($tenancy->agent_mobile ?? ''));
        $savedEmail  = trim(strtolower($tenancy->agent_email ?? ''));

        // Match with agent mobile or agent email
        if ((!empty($savedMobile) && $savedMobile === $input) || 
            (!empty($savedEmail) && $savedEmail === $input)) {

            Session::put('agent_verified_token_' . $token, true);

            return redirect()->route('rms.public.onboard-view', $token)
                ->with('success', 'Identity confirmed! You can now edit and upload documents.');
        }

        return back()->with('error', 'The mobile number or email does not match the registered agent on this lease.');
    }

    /**
     * Save documents and tenancy details
     */
    public function publicSaveTenancy(Request $request, $token)
    {
        // Enforce session check
        if (!Session::get('agent_verified_token_' . $token, false)) {
            return redirect()->route('rms.public.onboard-view', $token)
                ->with('error', 'Please verify your agent details before submitting.');
        }

        $tenancy = TenantTenancyModel::with(['verification', 'tenant'])
            ->where('onboarding_token', $token)
            ->firstOrFail();

        if (in_array($tenancy->onboarding_status, ['Approved for Move-In', 'Owner Approve'])) {
            return back()->with('error', 'This property lease is already approved and locked.');
        }

        $request->validate([
            'identity_proof'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'pan_card'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'address_proof'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'employment_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'police_status'    => 'nullable|in:Not started,Applied,Under process,Completed',
            'police_ref'       => 'nullable|string|max:100',
            'police_file'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'agreement_status' => 'nullable|in:Not started,Draft prepared,Sent for signing,Executed',
            'agreement_date'   => 'nullable|date',
            'agreement_file'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $uploadFile = function ($key, $folder = 'tenant_docs') use ($request) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/' . $folder), $filename);
                return asset('uploads/' . $folder . '/' . $filename);
            }
            return null;
        };

        // 1. Update Core KYC
        $docData = [];
        if ($request->hasFile('identity_proof'))   $docData['identity_proof']   = $uploadFile('identity_proof', 'tenant_identities');
        if ($request->hasFile('pan_card'))         $docData['pan_card']         = $uploadFile('pan_card', 'tenant_pan');
        if ($request->hasFile('address_proof'))    $docData['address_proof']    = $uploadFile('address_proof', 'tenant_addresses');
        if ($request->hasFile('employment_proof')) $docData['employment_proof'] = $uploadFile('employment_proof', 'tenant_employment');

        if (!empty($docData)) {
            TenantDocumentModel::updateOrCreate(['tenant_id' => $tenancy->tenant_id], $docData);
        }

        // 2. Update Lease Verification
        $verifData = [
            'tenant_id'        => $tenancy->tenant_id,
            'tenancy_id'       => $tenancy->id,
            'police_status'    => $request->police_status ?? 'Not started',
            'police_ref'       => $request->police_ref,
            'agreement_status' => $request->agreement_status ?? 'Not started',
            'agreement_date'   => $request->agreement_date,
            'details_accurate' => $request->has('details_accurate') ? 1 : 0,
        ];

        if ($request->hasFile('police_file'))    $verifData['police_file']    = $uploadFile('police_file', 'tenant_police');
        if ($request->hasFile('agreement_file')) $verifData['agreement_file'] = $uploadFile('agreement_file', 'tenant_agreements');
        // if ($request->hasFile('rwa_file'))       $verifData['rwa_file']       = $uploadFile('rwa_file', 'tenant_rwa');

        TenantVerificationModel::updateOrCreate(['tenancy_id' => $tenancy->id], $verifData);

        // Move status back to Submitted if under review/corrections
        if (in_array($tenancy->onboarding_status, ['Corrections Required', 'Owner Returned', 'Draft'])) {
            $tenancy->update(['onboarding_status' => 'Submitted']);
        }

        return back()->with('success', 'All documents and tenancy details have been submitted successfully!');
    }
}