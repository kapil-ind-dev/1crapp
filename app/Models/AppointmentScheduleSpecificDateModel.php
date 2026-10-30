<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentScheduleSpecificDateModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_appointment_schedule_specific_dates';

    protected $fillable = [
        'schedule_id',
        'date',
    ];

    protected $casts = [
        'schedule_id' => 'integer',
        'date'        => 'date',
    ];
    
    public function windows()
    {
        return $this->hasMany(
            AppointmentScheduleSpecificDateWindowModel::class,
            'schedule_specific_date_id'
        )->orderBy('sort_order');
    }
}