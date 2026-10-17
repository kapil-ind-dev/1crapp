<?php

namespace App\Models\rms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentCollectionModel extends Model
{
    use HasFactory;

    protected $table = 'rms_rentcollection';

    protected $fillable = [
        'tenant_id',
        'shop_id',
        'collection_year',
        'collection_month',
        'basic_rent',
        'electricity_cost',
        'cleaning_cost',
        'other_charge',
        'penalty',
        'gross_due',
        'paid_amount',
        'status',
        'agent_id',
        'created_by',
        'remarks',
    ];

    protected $casts = [
        'collection_year' => 'integer',
        'collection_month' => 'integer',
        'basic_rent' => 'decimal:2',
        'electricity_cost' => 'decimal:2',
        'cleaning_cost' => 'decimal:2',
        'other_charge' => 'decimal:2',
        'penalty' => 'decimal:2',
        'gross_due' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'status' => 'integer',
    ];

    public function tenant()
    {
        return $this->belongsTo(TenantModel::class, 'tenant_id');
    }

    public function shop()
    {
        return $this->belongsTo(ShopModel::class, 'shop_id');
    }

    public function payments()
    {
        return $this->hasMany(RentPayment::class, 'rentcollection_id');
    }
    public function electricity()
    {
        return $this->hasOne(
            ElectricityBillModel::class,
            'collection_id',
            'id'
        );
    }

}
