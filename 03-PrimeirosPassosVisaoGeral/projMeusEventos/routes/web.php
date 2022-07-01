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

Route::get('/ola-mundo', function (){
    return view('ola-mundo');
});

Route::get('/ola/{name?}', function ($nameok = null) {
    return 'Olá, ' . $nameok;
});

Route::get('/queries/{event?}', function ($event = null){

    // $events = \App\Models\Event::all();
    // $events = \App\Models\Event::all(['title', 'description']);

    // $events = \App\Models\Event::where('id', 1)->get();
    // $events = \App\Models\Event::where('id', 1)->first();
    // $events = \App\Models\Event::find($event);

    /*$event = new \App\Models\Event();
    $event->title = 'Evento TESTE via Eloquent e AR';
    $event->description = 'Evento teste';
    $event->body = 'corpo do evento';
    $event->start_event = date('Y-m-d H:i:s');
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();*/

    $event = \App\Models\Event::find(8);
    $event->title = 'Evento ATUALIZADO';
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();


    //return $events;

});
