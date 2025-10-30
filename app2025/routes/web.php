<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/eventos/{slug}', [\App\Http\Controllers\HomeController::class, 'show'])->name('event.single');


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
//Route::get('/admin/events/index',           [\app\Http\Controllers\Admin\EnventController::class, 'index']);
//Route::get('/admin/events/create',          [\app\Http\Controllers\Admin\EnventController::class, 'create']);
//Route::post('/admin/events/store',          [\app\Http\Controllers\Admin\EnventController::class, 'store']);
//Route::get('/admin/events/{event}/edit',  [\app\Http\Controllers\Admin\EnventController::class, 'edit']);
//Route::post('/admin/events/update/{event}',  [\app\Http\Controllers\Admin\EnventController::class, 'update']);
//Route::get('/admin/events/destroy/{event}', [\app\Http\Controllers\Admin\EnventController::class, 'destroy']);

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::prefix('/events')->name('event.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\EnventController::class, 'index'])->name('index');

        Route::get('/create', [\App\Http\Controllers\Admin\EnventController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Admin\EnventController::class, 'store'])->name('store');

        Route::get('/{event}/edit', [\App\Http\Controllers\Admin\EnventController::class, 'edit'])->name('edit');
        Route::post('/update/{event}', [\App\Http\Controllers\Admin\EnventController::class, 'update'])->name('update');

        Route::get('/destroy/{event}', [\App\Http\Controllers\Admin\EnventController::class, 'destroy'])->name('destroy');

    });
});
