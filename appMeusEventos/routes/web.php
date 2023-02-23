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

Route::get('/ola-mundo', function () {
    return view('ola-mundo');
});
// Verbos HTTP: GET, POST, PUT, PATCH, DELETE e Options

Route::get('/ola/{name?}', function ($name = 'Fulano...') {
    return 'Olá, ' . $name;
});

//Route::get('/queries/{id}', function ($id) {
//    // $events = \App\Models\Event::all(); // select * from events
//    // $events = \App\Models\Event::all(['title', 'description']); // select title, description from events
//
//    // $events = \App\Models\Event::where('id', 1)->get(); // select * from events WHERE id = 1
//    // $events = \App\Models\Event::where('id', 1)->first(); // select * from events WHERE id = 1
//    $events = \App\Models\Event::find($id); // select * from events WHERE id = 1
//
//    return $events;
//});

Route::get('/queries/{event?}', function ($event = null){

/*  $event = new \App\Models\Event();
    $event->title = 'Evento TESTE via Eloquent e AR';
    $event->description = 'Evento teste';
    $event->body = 'corpo do evento';
    $event->start_event = date('Y-m-d H:i:s');
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();
*/
    $event = \App\Models\Event::find(1);
    $event->title = 'Evento ATUALIZADO';
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();

});
