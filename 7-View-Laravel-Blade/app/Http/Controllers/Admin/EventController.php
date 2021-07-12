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
        return view('admin.events.index', compact('events')); //admin.events.index
    }

    public function store()
    {
        $eventData = [
            'title' => 'Titulo add 3' . rand(1, 100),
            'description' => 'Descrição 3333 UPDATE MASS',
            'body' => 'Corpo 3 UPDATE MASS',
            'start_event' => date('Y-m-d H:i:s'),
            'slug' => 'titulo-adddddd-3-with-array-3'
        ];
        return Event::create($eventData);
    }

    public function update($event)
    {
        $eventData = [
            'title' => 'Titulo add 3' . rand(1, 100),
        ];
        $event = \App\Models\Event::find($event);

        $event->update($eventData);

        return $event;
    }

    public function destroy($event)
    {
        $event = \App\Models\Event::findOrFail($event);
        return $event->delete();
    }
}
