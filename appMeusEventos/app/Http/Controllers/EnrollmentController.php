<?php

namespace App\Http\Controllers;

use App\Mail\UserEnrollmentMail;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        if ($event->enrolleds->contains(auth()->user())) {
            return redirect()->route('event.single', $event->slug);
        }

        return view('enrollment-confirm', compact('event'));

    }

    public function proccess()
    {

        if (!session()->has('enrollment')) {
            return redirect()->route('home');
        }

        $event = Event::find(session('enrollment'));

        /** @var \App\Models\User $user */
        $user = auth()->user();

        $event->enrolleds()->attach([
            $user->id => [
                'reference'=> uniqid(),
                'status' => 'ACTIVE'
            ]
        ]);
        session()->forget('enrollment');


        Mail::to($user)->send(new UserEnrollmentMail($user, $event));

        return redirect()->route('event.single', $event->slug);
    }
}
