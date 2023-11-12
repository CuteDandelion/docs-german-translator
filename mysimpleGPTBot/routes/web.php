<?php

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
    session(['sessionid' => random_bytes(10)]);
    return view('welcome');
});
Route::match(['get', 'post'], '/botman', [\App\Http\Controllers\BotmanController::class,'handle']);
Route::get('/file-access/{storeid}/{filename}', '\App\Http\Controllers\FileAccessController@show');

