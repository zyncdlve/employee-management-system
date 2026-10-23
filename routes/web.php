<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Carbon\Carbon;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.submit');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::get('/dashboard', function () {
    $employees = Employee::all();

    $maleCount = $employees->where('gender', 'Male')->count();

    $femaleCount = $employees->where('gender', 'Female')->count();

    $averageAge = round(
        $employees->avg(
            fn ($employee) => Carbon::parse($employee->birthday)->age
        ) ?? 0,
        1
    );

    $totalMonthlySalary = $employees->sum('monthly_salary');

    return view('dashboard', compact(
        'maleCount',
        'femaleCount',
        'averageAge',
        'totalMonthlySalary'
    ));
})->middleware('auth')->name('dashboard');


Route::get('/employees', [EmployeeController::class, 'index'])
    ->middleware('auth')
    ->name('employees.index');

Route::get('/employees/create', [EmployeeController::class, 'create'])
    ->middleware('auth')
    ->name('employees.create');

Route::post('/employees', [EmployeeController::class, 'store'])
    ->middleware('auth')
    ->name('employees.store');


Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])
    ->middleware('auth')
    ->name('employees.edit');

Route::put('/employees/{employee}', [EmployeeController::class, 'update'])
    ->middleware('auth')
    ->name('employees.update');
    
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])
    ->middleware('auth')
    ->name('employees.destroy');