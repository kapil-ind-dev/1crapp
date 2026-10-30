<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponTypeModel extends Model
{
    protected $table = 'tbl_coupon_type';
    protected $fillable = [
        'title'
    ];
}