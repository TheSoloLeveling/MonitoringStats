<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\WeatherStation;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\AuthController;
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




/*Public routes*/


Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/weather/searchDate/{dateBegin}/{dateEnd}', [WeatherController::class, 'searchByDate']);

Route::get('/weather/searchObject/{attribut}/{value1}/{value2}', [WeatherController::class, 'searchByValue']);

Route::get('/weather/searchDate&Object/{attribut}/{dateBegin}/{dateEnd}/{value1}/{value2}', [WeatherController::class, 'searchAll']);

Route::get('/weather/searchAll/{attribut}', [WeatherController::class, 'searchByElement']);

Route::get('/weather', [WeatherController::class, 'index']);



/*Protected routes*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function() {
 

    
    
    

    
});
