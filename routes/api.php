<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Users\App\Controllers\DeleteUserController;
use Lightit\Backoffice\Users\App\Controllers\GetUserController;
use Lightit\Backoffice\Users\App\Controllers\ListUserController;
use Lightit\Backoffice\Users\App\Controllers\StoreUserController;
use Lightit\Backoffice\Employees\App\Controllers\CreateEmployeeController;
use Lightit\Backoffice\Employees\App\Controllers\ListEmployeeController;
use Lightit\Backoffice\Tasks\App\Controllers\CreateTaskController;
use Lightit\Backoffice\Tasks\App\Controllers\UpdateTaskController;
use Lightit\Backoffice\Tasks\App\Controllers\ListTaskController;
use Lightit\Backoffice\Tasks\App\Controllers\GetTaskController;
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

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix('users')
    ->middleware([])
    ->group(static function () {
        Route::get('/', ListUserController::class);
        Route::get('/{user}', GetUserController::class)->withTrashed();
        Route::post('/', StoreUserController::class);
        Route::delete('/{user}', DeleteUserController::class);
    });

Route::prefix('employees')->group(function () {
        Route::post('/', CreateEmployeeController::class)->name('employees.create');
        Route::get('/', ListEmployeeController::class)->name('employees.list');
    });
    
Route::prefix('tasks')->group(function () {
        Route::post('/', CreateTaskController::class)->name('tasks.create');
        Route::get('/', ListTaskController::class)->name('tasks.list');
        Route::get('/{task}', GetTaskController::class)->name('tasks.get');
        Route::put('/{task}', UpdateTaskController::class)->name('tasks.put');
    });