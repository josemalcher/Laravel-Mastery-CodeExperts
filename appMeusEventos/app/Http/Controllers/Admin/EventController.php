<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function index()
    {
         $events = $this->event->paginate(3);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function show($event)
    {
        return 'Evento: ' . $event;
    }

    public function store(EventRequest $request)
    {
        // $request->validate([
        //     'title' => 'required|min:30',
        //     'description' => 'required',
        //     'body' => 'required',
        //     'start_event' => 'required',
        // ],

        // [
        //     'title.required' => 'Este campo de Títuilo é obrigatório',

        //     'required' => 'Este campo é obrigatório',
        //     'min' => 'Este campo requer mais caracteres. Mínimo é de :min'
        // ]);

        $event = $request->all();
        $event['slug'] = Str::slug($event['title']);

        $this->event->create($event);

        return redirect()->route('admin.events.index');
    }

    public function edit($event)
    {

        $event = $this->event->findOrFail($event);

        return view('admin.events.edit', compact('event'));
    }

    public function update($event, EventRequest $request)
    {
        $event = $this->event->findorFail($event);
        $event->update($request->all());

        return redirect()->back();
    }

    public function destroy($event)
    {
        $event = $this->event->findOrFail($event);
        $event->delete(); // 1
        // return \App\Models\Event::destroy([10,11,12]); // 3

        return redirect()->route('admin.events.index');
    }
}
