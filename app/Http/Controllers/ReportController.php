<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\Employee;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function monthly(Request $request)
    {
        $month = $request->input('month', now()->format('Y-m')); // Default to current month
        $report = Employee::with(['allowances' => function ($query) use ($month) {
            $query->where('month', 'like', "$month%");
        }])->get();

        return view('reports.monthly', compact('report', 'month'));
    }

    public function summary()
    {
        $employees = Employee::with(['allowances'])->get();
        $report = $employees->map(function ($employee) {
            $monthlyData = [];
            for ($i = 1; $i <= 12; $i++) {
                $month = now()->startOfYear()->addMonths($i)->format('Y-m');
                $monthlyAllowance = $employee->allowances->where('month', $month)->sum('amount');
                $monthlyData[$month] = $monthlyAllowance + $employee->basic_salary;
            }

            return [
                'name' => $employee->name,
                'monthly' => $monthlyData,
                'total' => array_sum($monthlyData),
                'average' => array_sum($monthlyData) / 12,
            ];
        });

        return view('reports.summary', compact('report'));
    }

    public function annual()
    {
        $report = Allowance::withCount('employeeAllowances as total_members')
            ->withSum('employeeAllowances as total', 'amount')
            ->get();

        return view('reports.annual', compact('report'));
    }

    //
}
