<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('login')




Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/test', [App\Http\Controllers\LoginController::class, 'apiWithoutKey']);

/*Route::prefix('test')->group(function () {
    Route::get('apiwithoutkey', [LoginController::class, 'apiWithoutKey'])->name('apiWithoutKey');
    //Route::get('apiwithkey', [ProjectController::class, 'apiWithKey'])->name('apiWithKey');
});*/


//Route::resource('test', LoginController::class);

Auth::routes();