<?php

namespace App\Models;

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

//    public function employee_transacts($employee_id) {
//
//    }

    protected $table = "transactions";
    protected $fillable = [
        "hours",
        "employee_id",
        'is_payed',
    ];
    protected $casts = [
        'is_payed' => 'datetime',
    ];

}
