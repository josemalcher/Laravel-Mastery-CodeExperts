<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $event = $request->all();
        $event['slug'] = Str::slug($event['title']);

        Event::create($event);

        return redirect()->to('/admin/events/index');
    }

    public function edit($event)
    {

        $event = Event::findOrFail($event);

        return view('admin.events.edit', compact('event'));
    }

    public function update($event, Request $request)
    {
        $event = Event::findorFail($event);
        $event->update($request->all());

        return redirect()->back();
    }

    public function destroy($event)
    {
        $event = Event::findOrFail($event);
        $event->delete(); // 1
        // return \App\Models\Event::destroy([10,11,12]); // 3

        return redirect()->to('/admin/events/index');
    }
}
