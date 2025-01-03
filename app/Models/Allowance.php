<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Define the relationship to EmployeeAllowance
    public function employeeAllowances()
    {
        return $this->hasMany(EmployeeAllowance::class);
    }
}
