<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Country\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [LoginController::class, 'login']);
Route::get('/country', [CountryController::class, 'index']);
Route::get('/country/{id}', [CountryController::class, 'findById']);

Route::group(['middleware' => ['jwt.verify']], function (){
    Route::get('/refresh', [LoginController::class, 'refresh']);
    Route::post('/country', [CountryController::class, 'addCountry']);
    Route::put('/country/{id}', [CountryController::class, 'updateCountry']);
    Route::delete('/country/{id}', [CountryController::class, 'deleteCountry']);
});
