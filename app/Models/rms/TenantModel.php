<?php
namespace App\Models\rms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenantModel extends Model
{
    use SoftDeletes;
    protected $table = 'rms_tenants';
    protected $fillable = [
        'agent_id',
        'name',
        'father_or_spouse_name',
        'dob',
        'gender',
        'email',
        'mobile',
        'alternate_mobile',
        'emergency_contact_name',
        'emergency_contact_phone',
        'pan_number',
        'gst_number',
        'billing_address',
        'permanent_address',
        'current_address',
        'company',
        'designation',
        'work_location',
        'due_diligence_notes',
        'pin',
        'password',
        'profile',
        'invoice_schedule',
        'onboard_date',
        'ra_renew_date',
        'status',
        'onboarding_status',
        'is_verified',
        'last_login_at',
        'created_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationships
    public function tenancies()
    {
        return $this->hasMany(TenantTenancyModel::class, 'tenant_id');
    }

    public function shops()
    {
        return $this->hasMany(TenantShopModel::class, 'tenant_id');
    }

    public function verifications()
    {
        return $this->hasMany(TenantVerificationModel::class, 'tenant_id');
    }
    public function documents(){
        return $this->hasOne(TenantDocumentModel::class, 'tenant_id');
    }
}