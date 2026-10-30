<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MembershipApplication extends Model
{
    protected $table = 'foundation_membership_applications';
    protected $guarded = ['id'];

    // Defaults for applications created from the 1crapp.com registration form.
    // Admin can change these per application in 1CR Foundation -> Manage Membership.
    const DEFAULT_DESIGNATION = 'Member';
    const DEFAULT_FEE = 0;
    const DEFAULT_DOCUMENTS = [
        'receipt'     => 'Pending',
        'supporting'  => 'Not Uploaded',
        'certificate' => 'Pending',
        'english'     => 'Pending',
        'hindi'       => 'Pending',
        'appointment' => 'N/A',
    ];

    // Called inside the registration transaction, so a failure here rolls back the user too.
    public static function createFromUser(User $user, $source = 'register')
    {
        $application = self::create([
            'agent_id'            => $user->agent_id,
            'user_id'             => $user->id,
            'name'                => $user->name,
            'email'               => $user->email,
            'mobile'              => $user->mobile,
            'referral_code'       => $user->applied_referral,
            'referred_by_user_id' => $user->applied_referral_userid,
            'designation'         => self::DEFAULT_DESIGNATION,
            'fee'                 => self::DEFAULT_FEE,
            'payment_status'      => 'Pending',
            'status'              => 'Pending',
            'documents'           => json_encode(self::DEFAULT_DOCUMENTS),
            'source'              => $source,
        ]);
        // Derived from the auto-increment id so it is always unique
        $application->application_no = sprintf('SIF-MA-%s-%03d', date('Y'), $application->id);
        $application->save();

        DB::table('foundation_membership_application_logs')->insert([
            'agent_id'       => $application->agent_id,
            'application_id' => $application->id,
            'application_no' => $application->application_no,
            'admin_id'       => null,
            'admin_name'     => 'Registration form',
            'action'         => 'Application submitted via registration',
            'created_at'     => now(),
        ]);
        return $application;
    }
}
