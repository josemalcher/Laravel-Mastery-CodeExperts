<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function start(Event $event)
    {
        session()->put('enrollement', $event->id);

        return redirect()->route('enrollement.confirm');
    }

    public function confirm()
    {
        // se o ususário não estiver autenticado...
    }
}
