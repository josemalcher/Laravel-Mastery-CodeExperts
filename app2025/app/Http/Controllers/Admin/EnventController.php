<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnventController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }
    public function index()
    {
        $events = $this->event->paginate(5);

        //resource/views/admin/events/index.blade.php // admin.events.index
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(EventRequest $request)
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

//        $request->validate([
//            'title' => 'required|min:30',
//            'description' => 'required',
//            'body' => 'required',
//            'start' => 'required',
//            'end' => 'required',
//        ],
//            [
//                'title.required' => 'Este campo de Títuilo é obrigatório',
//
//                'required' => 'Este campo é obrigatório',
//                'min' => 'Este campo requer mais caracteres. Mínimo é de :min'
//            ]);

        $event = $request->all();
        $event['slug'] = Str::slug($event['title']);

        //return Event::create(request()->all());
        $this->event->create($event);
        return redirect()->route('admin.event.index');
    }
    public function edit($event)
    {
        $event = $this->event->findOrFail($event);
        return view('admin.events.edit', compact('event'));
    }

    public function update($event, EventRequest $request)
    {
        /*$eventDATA = [
            'title' => 'Evento Atribuição em Massa ' . rand(1, 100),
        ];*/

        $event = $this->event->findOrFail($event);

        $event->update($request->all());

        //return redirect()->back();
        return redirect()->route('admin.event.index');
    }

    public function destroy($id)
    {
        $event = $this->event->findOrFail($id);
        $event->delete();

        return redirect()->route('admin.event.index');
    }
}
