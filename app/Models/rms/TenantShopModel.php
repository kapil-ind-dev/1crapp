<?php
namespace App\Models\rms;
use Illuminate\Database\Eloquent\Model;
class TenantShopModel extends Model
{
    protected $table = 'rms_tenant_shops';
    protected $fillable = [
        'tenant_id',
        'tenancy_id',
        'shop_id',
        'status',
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