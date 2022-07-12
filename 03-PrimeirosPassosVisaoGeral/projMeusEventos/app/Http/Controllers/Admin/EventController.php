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
        $events = Event::paginate(3);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store()
    {
        /*dd(\request()->all());
        $event = [
            'title' => 'Evento Atribuição em Massa ' . rand(1,100),
            'description' => 'Descrição',
            'body' => 'Conteudo do Evento',
            'slug' => 'evento-atribuicao-em-massa',
            'start_event' => date('Y-m-d H:i:s')
        ];

        return Event::create($event);*/

        $event = request()->all();
        $event['slug'] = Str::slug($event['title']);

        Event::create($event);

        return redirect()->to('/admin/events/index');
    }

    public function edit($event)
    {
        $event = Event::findOrFail($event);
        return view('admin.events.edit', compact('event'));
    }

    public function update($event)
    {
/*        $eventDATA = [
            'title' => 'Evento Atribuição em Massa ' . rand(1,1000),
        ];*/

        $event = Event::findOrFail($event);
        $event->update(request()->all());

        return redirect()->back();
    }

    public function destroy($event)
    {
        $event = Event::findOrFail($event);
        return $event->delete();
    }
}
