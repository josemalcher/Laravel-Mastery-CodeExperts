<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EnventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(5);

        //resource/views/admin/events/index.blade.php // admin.events.index
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store()
    {
        dd("CHEGAMOS NO METODO" . __METHOD__);

        $event = [
            'title' => 'Evento Atribuição em Massa' . rand(1, 100),
            'description' => 'Descrição',
            'body' => 'Conteudo do Evento',
            'slug' => 'evento-atribuicao-em-massa',
            'start' => date('Y-m-d H:i:s'),
            'end' => date('Y-m-d H:i:s')
        ];

        return Event::create($event);
    }

    public function update($id)
    {
        $eventDATA = [
            'title' => 'Evento Atribuição em Massa ' . rand(1, 100),
        ];

        $event = Event::find($id);

        $event->update($eventDATA);

        return $event;
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        return $event->delete();
    }
}
