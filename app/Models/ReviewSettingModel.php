<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewSettingModel extends Model
{
    protected $table = 'tbl_review_setting';

    protected $fillable = [
        'agent_id',
        'setting_id',

        'profile_status',
        'name_status',
        'email_status',
        'designation_status',
        'department_status',
        'organisation_status',
        'location_status',
        'star_rating_status',
        'review_count_status',
        'testimonial_status',
        'review_date_status',
        'phone_status',
        'badge_status',
        'video_testimonial_status',
        'watch_video_button',

        'whatsapp_enabled',
        'whatsapp_number',

        'call_enabled',
        'call_number',

        'video_enabled',
        'video_url',

        'meeting_enabled',
        'meeting_url',

        'website_enabled',
        'website_url',

        'status',
        'created_by',
    ];

    protected $casts = [
        'profile_status' => 'boolean',
        'name_status' => 'boolean',
        'email_status' => 'boolean',
        'designation_status' => 'boolean',
        'department_status' => 'boolean',
        'organisation_status' => 'boolean',
        'location_status' => 'boolean',
        'star_rating_status' => 'boolean',
        'review_count_status' => 'boolean',
        'testimonial_status' => 'boolean',
        'review_date_status' => 'boolean',
        'phone_status' => 'boolean',
        'badge_status' => 'boolean',
        'video_testimonial_status' => 'boolean',
        'watch_video_button' => 'boolean',

        'whatsapp_enabled' => 'boolean',
        'call_enabled' => 'boolean',
        'video_enabled' => 'boolean',
        'meeting_enabled' => 'boolean',
        'website_enabled' => 'boolean',

        'status' => 'boolean',
    ];
}