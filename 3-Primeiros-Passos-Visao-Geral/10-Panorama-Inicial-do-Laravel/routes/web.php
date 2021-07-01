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

Route::get('/queries/{event?}', function ($event = null) {

    //$events = \App\Models\Event::all();
    //$events = \App\Models\Event::all(['title', 'description']);

    //$event =  \App\Models\Event::where('id', 1)->get();

//  $event =  \App\Models\Event::where('id', 1)->first();
    //$events = \App\Models\Event::find($event);

    // insert into events(title, description, body, start_event) values(?,?,?,?)
    //Active Record
    /*
    $event = new \App\Models\Event();
    $event->title = 'Evento TESTE AR 2';
    $event->description = 'Evento gravado via AR 2';
    $event->body = 'conteudo...';
    $event->start_event = date('Y-m-d H:i:s');
    $event->slug = \Illuminate\Support\Str::slug($event->title);
    */

    //update event set title = ? , description = ? (...) where id = ?
    $event = \App\Models\Event::find(32);
    $event->title = 'EVENTO 2 Atualizado';
    $event->slug  = \Illuminate\Support\Str::slug($event->title);


    return $event->save();

    //return $event;

});
