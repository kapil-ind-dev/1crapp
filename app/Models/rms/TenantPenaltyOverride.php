<?php

namespace App\Models\rms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantPenaltyOverride extends Model
{
    use HasFactory;

    protected $table = 'rms_tenant_penalty_override';

    protected $fillable = [
        'tenant_id',
        'agent_id',
        'created_by',
    ];

    public function tenant()
    {
        return $this->belongsTo(
            TenantModel::class,
            'tenant_id'
        );
    }
}