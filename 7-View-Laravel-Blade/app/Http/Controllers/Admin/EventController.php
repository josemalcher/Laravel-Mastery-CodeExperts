<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        //$events = Event::all();
        $events = Event::paginate(10);
        return view('admin.events.index', compact('events')); //admin.events.index
    }

    public function store(EventRequest $request)
    {
        $event = $request->all();
        $event['slug'] = Str::slug($event['title']);

        Event::create($event);

        return redirect()->route('admin.events.index');
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function edit($event)
    {
        $event = Event::findOrFail($event);
        return view('admin.events.edit', compact('event'));
    }

    public function update($event, EventRequest $request)
    {

        $event = Event::findOrFail($event);

        $event->update($request->all());

        return redirect()->back();
    }

    public function destroy($event)
    {
        $event = Event::findOrFail($event);
        $event->delete();
        return redirect()->route('admin.events.index');
    }
}
