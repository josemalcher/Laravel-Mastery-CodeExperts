<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function start(Event $event)
    {
        session()->put('enrollment', $event->id);

        return redirect()->route('enrollment.confirm');
    }

    public function confirm()
    {
        if (!session()->has('enrollment')) {
            return redirect()->route('home');
        }
        $event = Event::find(session('enrollment'));

        return view('enrollment-confirm', compact('event'));

    }

    public function proccess()
    {
        if (!session()->has('enrollment')) {
            return redirect()->route('home');
        }

        $event = Event::find(session('enrollment'));
        $event->enrolleds()->attach([
            auth()->id() => [
                'reference'=> uniqid(),
                'status' => 'ACTIVE'
            ]
        ]);
        session()->forget('enrollment');

        return redirect()->route('event.single', $event->slug);
    }
}
