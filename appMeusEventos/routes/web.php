<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{EventController, EventPhotoController};

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/eventos/{slug}',  [HomeController::class, 'show'])->name('event.single');


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

Route::get('/queries/{event?}', function ($event = null) {

    /*  $event = new \App\Models\Event();
        $event->title = 'Evento TESTE via Eloquent e AR';
        $event->description = 'Evento teste';
        $event->body = 'corpo do evento';
        $event->start_event = date('Y-m-d H:i:s');
        $event->slug = \Illuminate\Support\Str::slug($event->title);

        return $event->save();
    */

    /*  $event = \App\Models\Event::find(1);
    $event->title = 'Evento ATUALIZADO';
    $event->slug = \Illuminate\Support\Str::slug($event->title);

    return $event->save();
*/
    // Atribuição Massa ou Mass Assingnment
    /*    $event = [
            'title' => 'Evento Atribuição em Massa',
            'description' => 'Descrição',
            'body' => 'Conteudo do Evento',
            'slug' => 'evento-atribuicao-em-massa',
            'start_event' => date('Y-m-d H:i:s')
        ];

        return \App\Models\Event::create($event);
    */
    /*
    $eventDATA = [
        // 'title' => 'UPDATE Atribuição em Massa',
        'description' => 'Descrição ATUALIZADA',
        // 'body' => 'Conteudo do Evento',
        // 'slug' => 'update-atribuicao-em-massa',
        // 'start_event' => date('Y-m-d H:i:s')
    ];

    $event = \App\Models\Event::find(1);
    $event->update($eventDATA);

    return $event;
    */

    // $event = \App\Models\Event::findOrFail(3);
    // return $event->delete(); // 1
    return \App\Models\Event::destroy([10, 11, 12]); // 3


});

//Rotas CRUD da base para eventos - inicial...
//Route::get('/admin/events/index', [EventController::class, 'index']);
//Route::get('/admin/events/create', [EventController::class, 'create']);
//Route::post('/admin/events/store', [EventController::class, 'store']);
//Route::get('/admin/events/{event}/edit', [EventController::class, 'edit']);
//Route::post('/admin/events/update/{event}', [EventController::class, 'update']);
//Route::get('/admin/events/destroy/{event}', [EventController::class, 'destroy']);

Route::prefix('/admin')->name('admin.')->group(function () {
    // Route::prefix('/events')->name('events.')->group(function () {
        // Route::get('/', [EventController::class, 'index'])->name('index');

        // Route::get('/create', [EventController::class, 'create'])->name('create');
        // Route::post('/store', [EventController::class, 'store'])->name('store');

        // Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
        // Route::post('/update/{event}', [EventController::class, 'update'])->name('update');

        // Route::get('/destroy/{event}', [EventController::class, 'destroy'])->name('destroy');

    // });


    /* Route::resources([
        'events' => EventController::class,
        'events.photos' => EventPhotoController::class
    ]); */

    Route::resource('events', EventController::class);
    Route::resource('events.photos', EventPhotoController::class);
    
});

