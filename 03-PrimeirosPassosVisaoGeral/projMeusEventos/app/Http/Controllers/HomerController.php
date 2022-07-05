<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomerController extends Controller
{
    public function index()
    {
        $events = \App\Models\Event::all();
        // $events = [];
        //return view('welcome', ['events'=> $events]);
        return view('welcome', compact('events'));
    }

    public function show($slug)
    {
        // $event = \App\Models\Event::where('slug', $slug)->first();
        $event = \App\Models\Event::whereSlug($slug)->first();

        return view('event', compact('event'));
    }
}
