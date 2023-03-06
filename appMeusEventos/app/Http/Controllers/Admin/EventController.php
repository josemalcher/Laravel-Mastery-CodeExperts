<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
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
//        $event = [
//            'title' => 'Evento Atribuição ' . rand(1,100),
//            'description' => 'Descrição',
//            'body' => 'Conteudo do Evento',
//            'slug' => 'evento-atribuicao-em-massa',
//            'start_event' => date('Y-m-d H:i:s')
//        ];
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
//        $eventDATA = [
//            // 'title' => 'UPDATE Atribuição em Massa',
//            'description' => 'ATUALIZADA ' . rand(1,1000),
//            // 'body' => 'Conteudo do Evento',
//            // 'slug' => 'update-atribuicao-em-massa',
//            // 'start_event' => date('Y-m-d H:i:s')
//        ];

        $event = Event::findorFail($event);
        $event->update(request()->all());

        return redirect()->back();
    }

    public function destroy($event)
    {
        $event = Event::findOrFail($event);
        return $event->delete(); // 1
        // return \App\Models\Event::destroy([10,11,12]); // 3
    }
}
