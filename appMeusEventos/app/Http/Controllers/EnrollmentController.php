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
        dd('Confirmando...');
    }
}
