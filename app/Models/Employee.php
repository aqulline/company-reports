<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'basic_salary'];

    // Define the allowances relationship
    public function allowances()
    {
        return $this->hasMany(EmployeeAllowance::class);
    }
}
