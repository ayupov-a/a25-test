<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;


    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function getTotalSum($employee_id, $hours): float|int|string
    {
        $employee = Employee::find($employee_id);
        try {
            $totalSum = $employee->rate_per_hour * $hours;
            if (!$totalSum) throw $e = new Exception("Invalid amount");
            return $totalSum;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    protected $table = "transactions";
    protected $fillable = [
        "hours",
        "employee_id",
        'is_paid',
    ];
    protected $casts = [
        'is_paid' => 'datetime',
    ];

}
