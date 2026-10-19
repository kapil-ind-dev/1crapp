<?php
namespace App\Models\rms;
use Illuminate\Database\Eloquent\Model;
class TenantVerificationModel extends Model
{
    protected $table = 'rms_tenant_verifications';
    protected $fillable = [
        'tenant_id',
        'tenancy_id',
        'police_status',
        'police_file',
        'agreement_status',
        'agreement_file',
        'rwa_method',
        'rwa_date',
        'rwa_recipient',
        'rwa_ref',
        'rwa_file',
        'details_accurate',
        'privacy_acknowledged',
    ];

    public function tenancy()
    {
        return $this->belongsTo(TenantTenancyModel::class, 'tenancy_id');
    }

    public function tenant()
    {
        return $this->belongsTo(TenantModel::class, 'tenant_id');
    }
}