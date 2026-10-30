<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentScheduleBlockedDateModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_appointment_schedule_blocked_dates';
    protected $fillable = [
        'schedule_id',
        'blocked_date',
        'reason',
    ];

    protected $casts = [
        'schedule_id'   => 'integer',
        'blocked_date'  => 'date',
    ];
}