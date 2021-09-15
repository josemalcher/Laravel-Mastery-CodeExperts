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

Route::get('/queries/{event?}', function ($event){

    //$events = \App\Models\Event::all();// SELECT * FROM events
    $events = \App\Models\Event::all(['title', 'description']);// SELECT * FROM events

    //$event = \App\Models\Event::where('id', 2)->get(); // SELECT * FROM events where id = 2
    //$event = \App\Models\Event::where('id', 2)->first(); // SELECT * FROM events where id = 2
    $event = \App\Models\Event::find($event); // SELECT * FROM events where id = 2

    //return $events;
    return $event;

});
