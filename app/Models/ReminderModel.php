<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReminderModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_appointment_reminder';

    protected $fillable = [
        'agent_id',
        'type',
        'title',
        'status',
        'created_by',
    ];
    public function items()
    {
        return $this->hasMany(AppointmentReminderItemModel::class, 'reminder_id', 'id');
    }
}