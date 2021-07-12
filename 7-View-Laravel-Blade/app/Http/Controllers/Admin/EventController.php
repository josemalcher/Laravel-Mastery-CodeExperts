<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        //$events = Event::all();
        $events = Event::paginate(10);
        return view('admin.events.index', compact('events')); //admin.events.index
    }

    public function store()
    {
        // Recuperando uma instância do Request
        // request()

        // Recuperar todos os conteúdos do form enviado como array
        //request()->all()

        // Recuperar uma chave específica do envio do form
        //request('title') || request()->get('title')

        // Recuperar uma chave espefífica do envio como propriedade
        // dd(request()->title)

        //dd('chegamos no controller e no método ' . __METHOD__);
//        $eventData = [
//            'title' => 'Titulo add 3' . rand(1, 100),
//            'description' => 'Descrição 3333 UPDATE MASS',
//            'body' => 'Corpo 3 UPDATE MASS',
//            'start_event' => date('Y-m-d H:i:s'),
//            'slug' => 'titulo-adddddd-3-with-array-3'
//        ];
        $event = request()->all();
        $event['slug'] = Str::slug($event['title']);

        Event::create($event);

        return redirect()->to('/admin/events/index');
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function edit($event)
    {
        $event = Event::findOrFail($event);
        return view('admin.events.edit', compact('event'));
    }

    public function update($event)
    {

        $event = Event::findOrFail($event);

        $event->update(request()->all());

        return redirect()->back();
    }

    public function destroy($event)
    {
        $event = \App\Models\Event::findOrFail($event);
        $event->delete();
        return redirect()->to('admin/events/index');
    }
}
