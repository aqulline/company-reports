<?php

namespace Database\Seeders;
use App\Models\Employee;
use App\Models\Allowance;
use App\Models\EmployeeAllowance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create Allowances
        $allowances = ['Food', 'Transport', 'Communication', 'Child Care', 'School Fee'];
        foreach ($allowances as $allowance) {
            Allowance::create(['name' => $allowance]);
        }

        // Create Employees and Assign Allowances
        Employee::factory(10)->create()->each(function ($employee) {
            for ($i = 1; $i <= 12; $i++) { // Generate monthly data
                foreach (Allowance::all() as $allowance) {
                    EmployeeAllowance::create([
                        'employee_id' => $employee->id,
                        'allowance_id' => $allowance->id,
                        'amount' => rand(10000, 50000), // Random allowance amount
                        'month' => now()->startOfYear()->addMonths($i)->format('Y-m-d'),
                    ]);
                }
            }
        });
    }
}
