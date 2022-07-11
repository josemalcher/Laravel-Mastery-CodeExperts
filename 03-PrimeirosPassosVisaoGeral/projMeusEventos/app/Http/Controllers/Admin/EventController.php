<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('admin.events.index', compact('events'));
    }

    public function store()
    {
        $event = [
            'title' => 'Evento Atribuição em Massa ' . rand(1,100),
            'description' => 'Descrição',
            'body' => 'Conteudo do Evento',
            'slug' => 'evento-atribuicao-em-massa',
            'start_event' => date('Y-m-d H:i:s')
        ];

        return Event::create($event);
    }

    public function update($event)
    {
        $eventDATA = [
            'title' => 'Evento Atribuição em Massa ' . rand(1,1000),
        ];

        $event = Event::find($event);
        $event->update($eventDATA);
        return $event;
    }

    public function destroy($event)
    {
        $event = Event::findOrFail($event);
        return $event->delete();
    }
}
