<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentScheduleWeeklyWindowModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_appointment_schedule_weekly_windows';

    protected $fillable = [
        'schedule_weekly_day_id',
        'start_time',
        'end_time',
        'sort_order',
    ];

    protected $casts = [
        'schedule_weekly_day_id' => 'integer',
        'sort_order'             => 'integer',
    ];
}