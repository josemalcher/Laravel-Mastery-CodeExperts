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
    return view('welcome');
});

/*Route::get('/ola-mundo', function () {
    return "Olá Mundo!!";
});*/
Route::get('/hello-world', [\App\Http\Controllers\HelloWordController::class, 'helloWord']);

//Verbos HTTP: GET, POST, PUT, PATCH, DELETE e Options

Route::get('/hello/{name?}',  [\App\Http\Controllers\HelloWordController::class, 'hello']);