<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Users\App\Controllers\DeleteUserController;
use Lightit\Backoffice\Users\App\Controllers\GetUserController;
use Lightit\Backoffice\Users\App\Controllers\ListUserController;
use Lightit\Backoffice\Users\App\Controllers\StoreUserController;
use Lightit\Backoffice\Employees\App\Controllers\CreateEmployeeController;
use Lightit\Backoffice\Employees\App\Controllers\ListEmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('employees')->group(function () {
        Route::post('/', CreateEmployeeController::class)->name('employees.create');
        Route::get('/', ListEmployeeController::class)->name('employees.list');
    });
    
