<?php
namespace App\Models\rms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\rms\ShopModel;
use App\Models\rms\TenantModel;
class ProjectModel extends Model
{
    protected $table = 'rms_projects';
    protected $fillable = [
        'agent_id',
        'name',
        'code',
        'city',
        'address',
        'status',
        'created_by',
    ];
    protected $casts = [
        'status' => 'integer',
    ];
    /**
     * Project has many shops.
     */
    public function shops(): HasMany
    {
        return $this->hasMany(ShopModel::class, 'project_id', 'id');
    }
    /**
     * Project has many tenants.
     */
    public function tenants()
    {
        return $this->hasManyThrough(
            TenantModel::class,
            TenantTenancyModel::class,
            'project_id', // Foreign key on rms_tenant_tenancies table...
            'id',         // Foreign key on rms_tenants table...
            'id',         // Local key on rms_projects table...
            'tenant_id'   // Local key on rms_tenant_tenancies table...
        );
    }
}
