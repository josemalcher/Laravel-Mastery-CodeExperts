<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function store(Request $request)
    {
        // dd("CHEGAMOS NO METODO" . __METHOD__);
        // dd(request()->all());
/*
        $event = [
            'title' => 'Evento Atribuição em Massa' . rand(1, 100),
            'description' => 'Descrição',
            'body' => 'Conteudo do Evento',
            'slug' => 'evento-atribuicao-em-massa',
            'start' => date('Y-m-d H:i:s'),
            'end' => date('Y-m-d H:i:s')
        ];*/
        $event = $request->all();
        $event['slug'] = Str::slug($event['title']);

        //return Event::create(request()->all());
        Event::create($event);
        return redirect()->route('admin.event.index');
    }
    public function edit($event)
    {
        $event = Event::findOrFail($event);
        return view('admin.events.edit', compact('event'));
    }

    public function update($event, Request $request)
    {
        /*$eventDATA = [
            'title' => 'Evento Atribuição em Massa ' . rand(1, 100),
        ];*/

        $event = Event::findOrFail($event);

        $event->update($request->all());

        //return redirect()->back();
        return redirect()->route('admin.event.index');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.event.index');
    }
}
