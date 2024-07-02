<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HellowWordController extends Controller
{
    public function helloWorld()
    {
        return view('ola-mundo');
    }

    public function hello($name = 'Fulano')
    {
        return 'Olá, ' . $name;
    }
}
