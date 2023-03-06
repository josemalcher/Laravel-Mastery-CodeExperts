<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(3);

        return view('admin.events.index', compact('events'));
    }

    public function store()
    {
        $event = [
            'title' => 'Evento Atribuição ' . rand(1,100),
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
            // 'title' => 'UPDATE Atribuição em Massa',
            'description' => 'ATUALIZADA ' . rand(1,1000),
            // 'body' => 'Conteudo do Evento',
            // 'slug' => 'update-atribuicao-em-massa',
            // 'start_event' => date('Y-m-d H:i:s')
        ];

        $event = Event::find($event);
        $event->update($eventDATA);

        return $event;
    }

    public function destroy($event)
    {
        $event = Event::findOrFail($event);
        return $event->delete(); // 1
        // return \App\Models\Event::destroy([10,11,12]); // 3
    }
}
