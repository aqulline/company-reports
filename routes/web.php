<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/report/monthly', [ReportController::class, 'monthly'])->name('report.monthly');
Route::get('/report/summary', [ReportController::class, 'summary'])->name('report.summary');
Route::get('/report/annual', [ReportController::class, 'annual'])->name('report.annual');
