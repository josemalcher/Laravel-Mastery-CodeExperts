<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function store()
    {
        //Atribuição Massa ou Mass Assingnment
        $event = [
            'title' => 'Evento Atribuição em Massa' . rand(1,100),
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
            'title' => 'ATUALIZADO '.rand(1,1000).' Evento Atribuição em Massa',
            // 'description' => 'Descrição ATUALIZADA',
            // 'body' => 'Conteudo do Evento',
            // 'slug' => 'evento-atribuicao-em-massa',
            // 'start_event' => date('Y-m-d H:i:s')
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
