<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Users\App\Controllers\DeleteUserController;
use Lightit\Backoffice\Users\App\Controllers\GetUserController;
use Lightit\Backoffice\Users\App\Controllers\ListUserController;
use Lightit\Backoffice\Users\App\Controllers\StoreUserController;

use Lightit\Backoffice\Cities\App\Controllers\ListCityController;
use Lightit\Backoffice\Cities\App\Controllers\GetCityController;
use Lightit\Backoffice\Cities\App\Controllers\CreateCityController;
use Lightit\Backoffice\Cities\App\Controllers\UpdateCityController;
use Lightit\Backoffice\Cities\App\Controllers\DeleteCityController;

use Lightit\Backoffice\Airlines\App\Controllers\ListAirlineController;
use Lightit\Backoffice\Airlines\App\Controllers\GetAirlineController;
use Lightit\Backoffice\Airlines\App\Controllers\CreateAirlineController;
use Lightit\Backoffice\Airlines\App\Controllers\UpdateAirlineController;
use Lightit\Backoffice\Airlines\App\Controllers\DeleteAirlineController;

use Lightit\Backoffice\Flights\App\Controllers\ListFlightController;
use Lightit\Backoffice\Flights\App\Controllers\GetFlightController;
use Lightit\Backoffice\Flights\App\Controllers\CreateFlightController;
use Lightit\Backoffice\Flights\App\Controllers\UpdateFlightController;
use Lightit\Backoffice\Flights\App\Controllers\DeleteFlightController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

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


Route::prefix('cities')
    ->group(static function () {
        Route::get('/', ListCityController::class);
        Route::prefix('{city}')->group(function () { 
            Route::get('/', GetCityController::class)->withTrashed();
            Route::put('/', UpdateCityController::class);
            Route::delete('/', DeleteCityController::class);
        });
        Route::post('/', CreateCityController::class);
    });

Route::prefix('airlines')
    ->group(static function () {
        Route::get('/', ListAirlineController::class);
        Route::prefix('{airline}')->group(function () {
            Route::get('/', GetAirlineController::class)->withTrashed();
            Route::put('/', UpdateAirlineController::class);
            Route::delete('/', DeleteAirlineController::class);
        });
        Route::post('/', CreateAirlineController::class);    
    });

Route::prefix('flights')
    ->group(static function () {
        Route::get('/', ListFlightController::class);
        Route::prefix('{flight}')->group(function () {
            Route::get('/', GetFlightController::class)->withTrashed();
            Route::put('/', UpdateFlightController::class);
            Route::delete('/', DeleteFlightController::class);
        });        
        Route::post('/', CreateFlightController::class);   
    });
