<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentScheduleModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_appointment_schedules';

    protected $fillable = [
        'agent_id',
        'title',
        'type',
        'is_default',
        'status',
        'created_by',
    ];

    protected $casts = [
        'agent_id'   => 'integer',
        'is_default' => 'integer',
        'status'     => 'integer',
        'created_by' => 'integer',
    ];

    public function weeklyDays()
    {
        return $this->hasMany(
            AppointmentScheduleWeeklyDayModel::class,
            'schedule_id'
        );
    }

    public function specificDates()
    {
        return $this->hasMany(
            AppointmentScheduleSpecificDateModel::class,
            'schedule_id'
        );
    }

    public function blockedDates()
    {
        return $this->hasMany(
            AppointmentScheduleBlockedDateModel::class,
            'schedule_id'
        );
    }
}