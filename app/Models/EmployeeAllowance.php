<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAllowance extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'allowance_id', 'amount', 'month'];

    // Define the relationship to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Define the relationship to Allowance
    public function allowance()
    {
        return $this->belongsTo(Allowance::class);
    }
}
