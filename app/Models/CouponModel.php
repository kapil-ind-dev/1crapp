<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    protected $table = 'tbl_coupons';
    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'usage_limit',
        'applies_specific_booking',
        'valid_from',
        'expires_on',
        'created_by',
        'status'
    ];

    public function bookingTypes()
    {
        return $this->hasMany(CouponTypeMapModel::class, 'coupon_id');
    }
}