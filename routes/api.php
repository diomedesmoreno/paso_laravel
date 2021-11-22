<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// 
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ChangePasswordController;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\TicketController;
// use App\Http\Controllers\GeneralController;
// use App\Http\Controllers\GeneralInformationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
        'middleware' => 'api',
        'namespace' => 'App\Http\Controllers',
        'prefix' => 'auth'
    ], function ($router) {

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refreshToken', [AuthController::class, 'refresh'])->name('refreshToken');
    Route::get('getMyData', [AuthController::class, 'profile'])->name('getMyData');
    Route::post('sendEmail', [ResetPasswordController::class, 'sendEmail'])->name('sendEmail');
    Route::post('resetPassword', [ChangePasswordController::class, 'process'])->name('resetPassword');

});
Route::group([
        'middleware' => 'api',
        // 'middleware' => 'auth:api',
        // 'namespace' => 'App\Http\Controllers',
    ], function ($router) {
    // 
    // Pais
    Route::get('/countries', [CountryController::class, 'table']);
    
    // Vuelos
    Route::get('flights', [FlightController::class, 'table']);
    Route::post('flights', [FlightController::class, 'store']);
    Route::put('flights/{id}', [FlightController::class, 'update']);
    Route::get('flights/{id}', [FlightController::class, 'show']);
    // Pasajero
    Route::get('passenger', [PassengerController::class, 'table']);
    Route::post('passenger', [PassengerController::class, 'store']);
    Route::put('passenger/{id}', [PassengerController::class, 'update']);
    Route::get('passenger/{id}', [PassengerController::class, 'details']);
    // Ticket
    // Route::get('ticket', [TicketController::class, 'table']);
    Route::post('ticket', [TicketController::class, 'store']);
    Route::put('ticket/{id}', [TicketController::class, 'update']);
    // Route::get('ticket/{id}', [TicketController::class, 'show']);


});