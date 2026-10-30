<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBookingCmsItem extends Model
{
    use HasFactory;

    protected $table = 'tbl_masterbookingcms_items';

    protected $fillable = [
        'booking_id',
        'image',
        'title',
        'sub_title',
    ];
    public function booking_cms(){
        return $this->hasOne(MasterBookingCms::class, 'id');
    }
}