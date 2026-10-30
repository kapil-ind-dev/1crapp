<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponTypeMapModel extends Model
{
    protected $table = 'tbl_coupon_type_map';
    protected $fillable = [
        'coupon_id',
        'booking_type_id'
    ];

    public function coupon()
    {
        return $this->belongsTo(CouponModel::class, 'coupon_id');
    }
    public function type()
    {
        return $this->belongsTo(CouponTypeModel::class, 'booking_type_id');
    }
}