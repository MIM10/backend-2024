<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/employees', [EmployeesController::class, 'index']);
    Route::get('/employees/{id}', [EmployeesController::class, 'show']);
    Route::post('/employees', [EmployeesController::class, 'store']);
    Route::put('/employees/{id}', [EmployeesController::class, 'update']);
    Route::delete('/employees/{id}', [EmployeesController::class, 'destroy']);
    
    Route::get('/employees/search/{nama}', [EmployeesController::class, 'search']);
    Route::get('/employees/status/active', [EmployeesController::class, 'active']);
    Route::get('/employees/status/inactive', [EmployeesController::class, 'inactive']);
    Route::get('/employees/status/terminated', [EmployeesController::class, 'terminate']);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);