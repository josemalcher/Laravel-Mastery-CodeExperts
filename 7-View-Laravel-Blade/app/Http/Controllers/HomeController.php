<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        //$events = [];
        //return view('welcome', ['events'=>$events]);
        // compac('event') => \App\Models\Event::all();
        return view('welcome', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::whereSlug($slug)->first();

        return view('event', compact('event'));
    }
}
