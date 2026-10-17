<?php

namespace App\Models\rms;

use Illuminate\Database\Eloquent\Model;

class PenaltySetting extends Model
{
    protected $table = 'rms_penalty_setting';

    protected $fillable = [
        'agent_id',
        'day_of_due',
        'penalty1_day',
        'penalty1',
        'penalty2_day',
        'penalty2',
        'penalty3_day',
        'penalty3',
        'created_by',
    ];

    protected $casts = [
        'day_of_due'   => 'integer',
        'penalty1_day' => 'integer',
        'penalty1'     => 'decimal:2',
        'penalty2_day' => 'integer',
        'penalty2'     => 'decimal:2',
        'penalty3_day' => 'integer',
        'penalty3'     => 'decimal:2',
    ];
}