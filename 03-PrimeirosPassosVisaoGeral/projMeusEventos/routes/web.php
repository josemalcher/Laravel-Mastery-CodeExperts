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
    $events = \App\Models\Event::all();

    //return view('welcome', ['events'=> $events]);
    return view('welcome', compact('events'));
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
    //return $events;

    /*$event = new \App\Models\Event();
    $event->title = 'Evento TESTE via Eloquent e AR';
    $event->description = 'Evento teste';
    $event->body = 'corpo do evento';
    $event->start_event = date('Y-m-d H:i:s');
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();*/
/*
    $event = \App\Models\Event::find(8);
    $event->title = 'Evento ATUALIZADO';
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();*/
/*
    // Atribuição Massa ou Mass Assingnment
    $event = [
        'title' => 'Evento Atribuição em Massa',
        'description' => 'Descrição',
        'body' => 'Conteudo do Evento',
        'slug' => 'evento-atribuicao-em-massa',
        'start_event' => date('Y-m-d H:i:s')
    ];

    return \App\Models\Event::create($event);
    */

/*    $eventDATA = [
       // 'title' => 'Evento Atribuição em Massa',
        'description' => 'Descrição ATUALIZADA',
       // 'body' => 'Conteudo do Evento',
       // 'slug' => 'evento-atribuicao-em-massa',
       // 'start_event' => date('Y-m-d H:i:s')
    ];

    $event = \App\Models\Event::find(9);
    $event->update($eventDATA);*/

    // $event = \App\Models\Event::findOrFail(9);
    // return $event->delete();

    return \App\Models\Event::destroy([8,7,6]);

});

Route::get('events/index', [\App\Http\Controllers\EventController::class, 'index']);
Route::get('events/store', [\App\Http\Controllers\EventController::class, 'store']);
Route::get('events/update/{event}', [\App\Http\Controllers\EventController::class, 'update']);
Route::get('events/destroy/{event}', [\App\Http\Controllers\EventController::class, 'destroy']);

// Route::get('view-teste', fn() => view('teste.index') );


