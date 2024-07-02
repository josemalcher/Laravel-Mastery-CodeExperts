<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/ola-mundo', function () {
    return view('ola-mundo');
});

Route::get('/ola/{name?}', function ($name = 'Fulano...') {
    return 'Olá, ' . $name;
});
*/

Route::get('/ola-mundo', [\App\Http\Controllers\HellowWordController::class, 'helloWorld']);
// Verbos HTTP: GET, POST, PUT, PATCH, DELETE e Options

Route::get('/ola/{name?}', [\App\Http\Controllers\HellowWordController::class, 'hello']);
