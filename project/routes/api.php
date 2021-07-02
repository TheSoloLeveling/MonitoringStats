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


/*Protected routes*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function() {
 

    Route::get('/weather/search/{attribut}', [WeatherController::class, 'searchByElement']);

    //Route::get('/weather/search/{attribut}/{dateBegin}/{dateEnd}', [WeatherController::class, 'searchByElement']);

    Route::get('/weather/search/{dateBegin}/{dateEnd}', [WeatherController::class, 'searchByDate']);

    Route::get('/weather', [WeatherController::class, 'index']);

    Route::get('/weather/index/{id}', [WeatherController::class, 'show']);
});
