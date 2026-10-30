<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBookingCms extends Model
{
    use HasFactory;

    protected $table = 'tbl_masterbooking_cms';

    protected $fillable = [
        'agent_id',
        'title',
        'slug',
        'sub_title',
        'custom_header',
        'custom_footer',
        'review_status',
        'description',
        'quotes',
        'type_ids',
        'testimonial_ids',
        'testimonial_status',
        'status',
        'created_by',
    ];

    protected $casts = [
        'review_status'      => 'integer',
        'testimonial_status' => 'integer',
        'created_at'         => 'datetime',
        'updated_at'         => 'datetime',
    ];

    /**
     * CMS has many feature/items
     */
    public function features()
    {
        return $this->hasMany(
            MasterBookingCmsItem::class,
            'booking_id', 'id'
        );
    }
}