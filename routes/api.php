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
use App\Http\Controllers\DetailsFlightController;
use App\Http\Controllers\CountriesController;

use App\Http\Controllers\AirportsController;
use App\Http\Controllers\TypesPlanesController;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\CompaniesController;

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
    Route::get('/countries', [CountriesController::class, 'table']);
    
    // Vuelos
    Route::get('flights', [FlightController::class, 'table']);
    Route::post('flights', [FlightController::class, 'store']);
    Route::put('flights/{id}', [FlightController::class, 'update']);
    Route::get('flights/{id}', [FlightController::class, 'show']);
    Route::get('flights-search', [FlightController::class, 'search']);
    // Pasajero
    Route::get('passengers', [PassengerController::class, 'table']);
    Route::post('passengers', [PassengerController::class, 'store']);
    Route::put('passengers/{id}', [PassengerController::class, 'update']);
    Route::get('passengers/{id}', [PassengerController::class, 'details']);
    // Ticket
    // Route::get('ticket', [TicketController::class, 'table']);
    Route::post('tickets', [TicketController::class, 'store']);
    Route::post('tickets-reservation', [TicketController::class, 'saveTicket']);
    Route::put('tickets/{id}', [TicketController::class, 'update']);
    // Detalle
    Route::get('details', [DetailsFlightController::class, 'table']);
    Route::post('details', [DetailsFlightController::class, 'store']);
    Route::put('details/{id}', [DetailsFlightController::class, 'update']);
    Route::get('details/{id}', [DetailsFlightController::class, 'details']);
    // Aeropuerto     
    Route::get('airports', [AirportsController::class, 'table']);
    Route::post('airports', [AirportsController::class, 'store']);
    Route::put('airports/{id}', [AirportsController::class, 'update']);
    Route::get('airports/{id}', [AirportsController::class, 'show']);
    // Tipos de aviones
    Route::get('type-plane', [TypesPlanesController::class, 'table']);
    Route::post('type-plane', [TypesPlanesController::class, 'store']);
    Route::put('type-plane/{id}', [TypesPlanesController::class, 'update']);
    Route::get('type-plane/{id}', [TypesPlanesController::class, 'show']);
    // Aviones
    Route::get('planes', [PlanesController::class, 'index']);
    Route::post('planes', [PlanesController::class, 'store']);
    Route::put('planes/{id}', [PlanesController::class, 'update']);
    Route::get('planes/{id}', [PlanesController::class, 'show']);
    // Companias
    Route::get('companies', [CompaniesController::class, 'table']);
    Route::post('companies', [CompaniesController::class, 'store']);
    Route::put('companies/{id}', [CompaniesController::class, 'update']);
    Route::get('companies/{id}', [CompaniesController::class, 'show']);

});