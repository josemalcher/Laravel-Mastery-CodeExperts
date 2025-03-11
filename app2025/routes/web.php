<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $events = \App\Models\Event::all();

    //return view('welcome', ['events'=> $events]);
    return view('welcome', compact('events'));
});
/*
Route::get('/queries/{id}', function ($id) {
    // $events = \App\Models\Event::all(); // select * from events
    // $events = \App\Models\Event::all(['title', 'description']); // select title, description from events

    // $events = \App\Models\Event::where('id', 1)->get(); // select * from events WHERE id = 1
    // $events = \App\Models\Event::where('id', 1)->first(); // select * from events WHERE id = 1
    $events = \App\Models\Event::find($id); // select * from events WHERE id = 1

    return $events;
});

Route::get('/queries/{event?}', function ($event = null){

    $event = new \App\Models\Event();
    $event->title = 'Evento TESTE via Eloquent e AR';
    $event->description = 'Evento teste';
    $event->body = 'corpo do evento';
    $event->start = date('Y-m-d H:i:s');
    $event->end = date('Y-m-d H:i:s');
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();

});

Route::get('/queries/{event?}', function ($event = null){

    $event = \App\Models\Event::find(1);
    $event->title = 'Evento ATUALIZADO';
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();

});

Route::get('/queries/{event?}', function ($event = null){

    // Atribuição Massa ou Mass Assingnment
    $event = [
        'title' => 'Evento Atribuição em Massa',
        'description' => 'Descrição',
        'body' => 'Conteudo do Evento',
        'slug' => 'evento-atribuicao-em-massa',
        'start' => date('Y-m-d H:i:s'),
        'end' => date('Y-m-d H:i:s')
    ];

    return \App\Models\Event::create($event);

});*/

Route::get('/queries/{event?}', function ($event = null){
/*
    $eventDATA = [
        // 'title' => 'Evento Atribuição em Massa',
        'description' => 'Descrição ATUALIZADA',
        // 'body' => 'Conteudo do Evento',
        // 'slug' => 'evento-atribuicao-em-massa',
        // 'start_event' => date('Y-m-d H:i:s')
    ];

    $event = \App\Models\Event::find(1);
    $event->update($eventDATA);

    return $event;*/


    // $event = \App\Models\Event::findOrFail(2);
    //return $event->delete(); // 1

    return \App\Models\Event::destroy([8,7,6]); // 3


});

//ROTAS CRUD BASE para Eventos
Route::get('/events/index',           [\App\Http\Controllers\EnventController::class, 'index']);
Route::get('/events/store',           [\App\Http\Controllers\EnventController::class, 'store']);
Route::get('/events/update/{event}',  [\App\Http\Controllers\EnventController::class, 'update']);
Route::get('/events/destroy/{event}', [\App\Http\Controllers\EnventController::class, 'destroy']);
