<?php

namespace App\Models\rms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    use HasFactory;

    protected $table = 'rms_shops';

    protected $fillable = [
        'project_id',
        'account_id',
        'shop_name',
        'type',
        'monthly_rent',
        'cleaning_cost',
        'electricity_applicable',
        'agent_id',
        'issue_day',
        'due_day',
        'created_by',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(ProjectModel::class, 'project_id');
    }
    public function account()
    {
        return $this->belongsTo(AccountModel::class, 'account_id');
    }
    public function tenancies()
    {
        return $this->hasMany(TenantTenancyModel::class, 'shop_id', 'id');
    }
}