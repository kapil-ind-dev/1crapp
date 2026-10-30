<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentScheduleWeeklyDayModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_appointment_schedule_weekly_days';

    protected $fillable = [
        'schedule_id',
        'day_of_week',
        'status',
    ];

    protected $casts = [
        'schedule_id' => 'integer',
        'day_of_week' => 'integer',
        'status'      => 'integer',
    ];
    public function windows()
    {
        return $this->hasMany(
            AppointmentScheduleWeeklyWindowModel::class,
            'schedule_weekly_day_id'
        )->orderBy('sort_order');
    }
}