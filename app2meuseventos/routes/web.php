<?php

use App\Http\Controllers\{Admin\EventController, HomeController};
use App\Models\Event;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $events = Event::all();
    // $events = [];

    //return view('welcome', ['events'=> $events]);
    return view('welcome', compact('events'));
});

Route::get('/queries/{event?}', function ($event = null) {

    // $events = \App\Models\Event::all(); // select * from events
    // $events = \App\Models\Event::all(['title', 'description']); // select title, description from events

    // $events = \App\Models\Event::where('id', 1)->get(); // select * from events WHERE id = 1
    // $events = \App\Models\Event::where('id', 1)->first(); // select * from events WHERE id = 1
    // $events = \App\Models\Event::find($id); // select * from events WHERE id = 1


    // insert into events(title, description, body, start_event) values(?,?,?,?);
    // Active Record

    /*    $event = new \App\Models\Event();
        $event->title = 'Evento TESTE via Eloquent e AR';
        $event->description = 'Evento teste';
        $event->body = 'corpo do evento';
        $event->start_event = date('Y-m-d H:i:s');
        $event->slug = \Illuminate\Support\Str::slug($event->title);
    */

    // update events set title = ?, description = ?, start_event = ?, slug = ? where id = ?
//    $event = \App\Models\Event::find(8);
//    $event->title = 'Evento ATUALIZADO';
//    $event->slug = \Illuminate\Support\Str::slug($event->title);
//
//    return $event->save(); //

    // Atribuição Massa ou Mass Assingnment
//    $event = [
//        'title' => 'Evento Atribuição em Massa',
//        'description' => 'Descrição',
//        'body' => 'Conteudo do Evento',
//        'slug' => 'evento-atribuicao-em-massa',
//        'start_event' => date('Y-m-d H:i:s')
//    ];
//    return \App\Models\Event::create($event);
//
//    $eventDATA = [
//        'title' => 'ATUALIZADA Evento Atribuição em Massa',
//        'description' => 'Descrição ATUALIZADA',
//        // 'body' => 'Conteudo do Evento',
//        // 'slug' => 'evento-atribuicao-em-massa',
//        // 'start_event' => date('Y-m-d H:i:s')
//    ];
//
//    $event = \App\Models\Event::find(32);
//    $event->update($eventDATA);
//
//    return $event;
//
    $event = Event::findOrFail(32);

    return $event->delete(); // 1
});

Route::get('/ola-mundo', [\App\Http\Controllers\HellowWordController::class, 'helloWorld']);
// Verbos HTTP: GET, POST, PUT, PATCH, DELETE e Options

Route::get('/ola/{name?}', [\App\Http\Controllers\HellowWordController::class, 'hello']);

Route::get('/admin/events/index',            [EventController::class, 'index']);
Route::get('/admin/events/store',            [EventController::class, 'store']);
Route::get('/admin/events/update/{event}',   [EventController::class, 'update']);
Route::get('/admin/events/destroy/{event}',  [EventController::class, 'destroy']);


Route::get('/', [HomeController::class, 'index']);
Route::get('/eventos/{slug}',  [HomeController::class, 'show']);
