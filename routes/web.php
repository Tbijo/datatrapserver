<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MetaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    // GET a POST pre Data o Zbierani praci
    Route::get('data/{unixtime}', [DataController::class,'getData']);
    Route::post('data', [DataController::class,'insert']);

    // GET a POST pre Doplnkove data Specie, EnvType, Method, MethodType, Protocol, TrapType, VegetType
    Route::get('meta/{unixtime}', [MetaController::class, 'getData']);
    Route::post('meta', [MetaController::class, 'insert']);

    // POST pre Data o Fotkach aj Fotky samotne
    Route::post('image', [ImageController::class, 'insert']);
});
