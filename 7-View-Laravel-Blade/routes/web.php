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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

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
    /*  $event = \App\Models\Event::find(32);
        $event->title = 'EVENTO 2 Atualizado';
        $event->slug  = \Illuminate\Support\Str::slug($event->title);
    */

    //return $event->save();
    //return $event;

    // Update em massa
    /*
        $eventData = [
            //    'title' => 'Titulo add 3',
            'description' => 'Descrição 3333 UPDATE MASS',
            'body' => 'Corpo 3 UPDATE MASS',
            //    'start_event' => date('Y-m-d H:i:s'),
            //    'slug' => 'titulo-adddddd-3-with-array-3'
        ];

        $event = \App\Models\Event::find(33);
        $event->update($eventData);
    */

    /*  $event = \App\Models\Event::findOrFail(1);
        return $event->delete();
    */
    //Delete Models via ids  [ 2,3,4,5]
    //return \App\Models\Event::destroy([2, 3, 4, 5]);

    //Select * from events order by id ASC limt 3
    return \App\Models\Event::orderBy('id', 'ASC')->limit(3)->get();
});

//Rotas CRUD BASE para evenos...
Route::get('/admin/events/index', [\App\Http\Controllers\Admin\EventController::class, 'index']);
Route::get('/admin/events/create', [\App\Http\Controllers\Admin\EventController::class, 'create']);

Route::post('/admin/events/store', [\App\Http\Controllers\Admin\EventController::class, 'store']);

Route::get('/admin/events/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update']);
Route::get('/admin/events/destroy/{event}', [\App\Http\Controllers\Admin\EventController::class, 'destroy']);

Route::get('/eventos/{slug}', [\App\Http\Controllers\HomeController::class, 'show']);
