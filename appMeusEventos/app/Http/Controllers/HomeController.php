<?php

namespace App\Http\Controllers;

use App\Models\{Event, Category};
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
        $byCategory = request()->has('category')
            ? Category::whereSlug(request()->get('category'))->first()->events()
            : null ;


        // $events = $this->event->orderBy('start_event', 'DESC');

//        if( $query = request()->query('s')){
//            $events->where('title', 'LIKE', '%' . $query . '%');
//        }

        $events = $this->event->getEventsHome($byCategory)->paginate(12);

        // $events = $events->paginate(12);

        $categories = Category::all(['nome', 'slug']);

        return view('home', compact('events', 'categories'));
    }

    public function show($slug)
    {
        $event = $this->event->where('slug', $slug)->first();

        return view('event', compact('event'));
    }
}
