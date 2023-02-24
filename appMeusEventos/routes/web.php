<?php

use App\Http\Controllers\EventController;
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
Route::get('events/index', [EventController::class, 'index']);
Route::get('events/store', [EventController::class, 'store']);
Route::get('events/update/{event}', [EventController::class, 'update']);
Route::get('events/destroy/{event}', [EventController::class, 'destroy']);
