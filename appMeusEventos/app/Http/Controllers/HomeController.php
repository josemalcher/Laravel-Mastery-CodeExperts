<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $event;

    /**
     * @param $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function index()
    {
        $events = $this->event
            ->orderBy('start_event', 'DESC')
            ->paginate(12);

        return view('home', compact('events'));
    }

    public function show($slug)
    {
        $event = $this->event->where('slug', $slug)->first();

        return view('event', compact('event'));
    }
}
