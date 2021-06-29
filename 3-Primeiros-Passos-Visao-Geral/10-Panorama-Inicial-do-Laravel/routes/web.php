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

Route::get('hello', [\App\Http\Controllers\HelloWorldController::class, 'helloworld']);

// ? -> informa que o parâmetro não é obrigatório
Route::get('/hello-name/{name?}', [\App\Http\Controllers\HelloWorldController::class, 'hello']);

Route::get('/queries/{event}', function ($event) {

    //$events = \App\Models\Event::all();
    //$events = \App\Models\Event::all(['title', 'description']);

    //$event =  \App\Models\Event::where('id', 1)->get();

//  $event =  \App\Models\Event::where('id', 1)->first();
    $events = \App\Models\Event::find($event);

    return $events;

});
