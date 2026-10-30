<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentScheduleSpecificDateWindowModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_appointment_schedule_specific_date_windows';

    protected $fillable = [
        'schedule_specific_date_id',
        'start_time',
        'end_time',
        'sort_order',
    ];

    protected $casts = [
        'schedule_specific_date_id' => 'integer',
        'sort_order'                => 'integer',
    ];
}