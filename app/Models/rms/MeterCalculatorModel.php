<?php
namespace App\Models\rms;
use Illuminate\Database\Eloquent\Model;
class MeterCalculatorModel extends Model
{
    protected $table = 'rms_meter_calculator';
    protected $fillable = [
        'total_unit',
        'bill_amount',
        'unit_rate',
        'apply_rate',
        'created_by',
    ];
    protected $casts = [
        'total_unit'  => 'decimal:2',
        'bill_amount' => 'decimal:2',
        'unit_rate'   => 'decimal:2',
        'apply_rate'  => 'decimal:2',
    ];
}