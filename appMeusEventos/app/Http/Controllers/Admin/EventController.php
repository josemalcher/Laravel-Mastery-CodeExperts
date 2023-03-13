<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;

        $this->middleware('user.can.edit.event') // Edit e Update
        ->only('edit', 'update');
    }

    public function index()
    {
        // dd(auth()->user()->events);

        $events = auth()->user()->events()->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function show($event)
    {
        dd($this->event->find($event));
        return 'Evento: ' . $event;
    }

    public function store(EventRequest $request)
    {
        // $banner = $request->file('banner');

        $event = $request->all();

        if ($banner = $request->file('banner')) {
            $event['banner'] = $banner->store('banner', 'public');
        }

        // $event['slug'] = Str::slug($event['title']);

        $event = $this->event->create($event);
        $event->owner()->associate(auth()->user());
        $event->save();

        return redirect()->route('admin.events.index');
    }

    public function edit(Event $event)
    {

        // $event = $this->event->findOrFail($event);

        return view('admin.events.edit', compact('event'));
    }

    public function update(Event $event, EventRequest $request)
    {
        // $event = $this->event->findOrFail($event);

        $eventData = $request->all();

        if ($banner = $request->file('banner')) {

            if(Storage::disk('public')->exists($event->banner)){
                Storage::disk('public')->delete($event->banner);
            }

            $eventData['banner'] = $banner->store('banner', 'public');
        }

        $event->update($eventData);

        return redirect()->back();
    }

    public function destroy(Event $event)
    {
        // $event = $this->event->findOrFail($event);
        $event->delete(); // 1
        // return \App\Models\Event::destroy([10,11,12]); // 3

        return redirect()->route('admin.events.index');
    }
}
