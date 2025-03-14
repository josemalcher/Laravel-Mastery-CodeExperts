<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EnventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function store()
    {
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
