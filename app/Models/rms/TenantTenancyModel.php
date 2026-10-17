<?php

namespace App\Models\rms;

use Illuminate\Database\Eloquent\Model;
use App\Models\rms\ProjectModel;
use App\Models\rms\ShopModel;

class TenantTenancyModel extends Model
{
    protected $table = 'rms_tenant_tenancies';

    protected $fillable = ['id', 'tenant_id', 'project_id', 'shop_id', 'movein_date', 'monthly_rent', 'source', 'agent_name', 'agency_name', 'agent_mobile', 'agent_email', 'status', 'onboarding_status', 'manager_checks', 'manager_notes', 'manager_reviewed_at', 'owner_notes', 'owner_approved_at', 'created_at', 'updated_at', 'onboarding_token', 'onboarding_token_expires_at'];

    /**
     * Relationship to the Project model
     */
    public function project()
    {
        return $this->belongsTo(ProjectModel::class, 'project_id');
    }

    /**
     * Relationship to the Shop / Property model
     */
    public function shop()
    {
        return $this->belongsTo(ShopModel::class, 'shop_id');
    }

    public function tenant()
    {
        return $this->belongsTo(TenantModel::class, 'tenant_id');
    }

    public function verification()
    {
        return $this->hasOne(TenantVerificationModel::class, 'tenancy_id');
    }

    public function shopMapping()
    {
        return $this->hasOne(TenantShopModel::class, 'tenancy_id');
    }
}
