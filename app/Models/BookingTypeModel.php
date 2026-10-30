<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTypeModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_booking_type';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'agent_id',
        'title',
        'meeting_url',
        'slug',
        'content',
        'duration',
        'location',
        'calendar_bg_color',
        'availability_status',
        'availabolity_type',
        'availability_id',
        
        'time_slot_intervals', 
        'interval_type', 
        'booking_gap', 
        'booking_days_ahead', 
        'notice_time', 
        'notice_time_type', 
        'max_booking_status', 
        'max_booking_count', 
        'max_booking_in', 
        'rescheduling_status', 
        'rsh_time', 
        'rsh_type', 
        'cancellation_status', 
        'manually_approve_status', 
        'ignore_external_calendar_status',
        'plan_type',
        'calendar',
        'form_status',
        'form_id',
        'cc_mail_status',
        'cc_mailid',
        'pre_reminder_status',
        'pre_reminder_id',
        'post_reminder_status',
        'post_reminder_id',
        'powered_by_status',
        'status',
        'created_by',
    ];

    protected $casts = [
        'agent_id'            => 'integer',
        'duration'            => 'integer',
        'availability_status' => 'integer',
        'status'               => 'integer',
        'created_by'           => 'integer',
    ];
    function type(){
        return $this->hasOne(BookingTypePaymentPlanModel::class, 'booking_type_id');
    }
    function availability(){
        return $this->hasOne(AppointmentScheduleModel::class, 'id', 'availability_id');
    }
}