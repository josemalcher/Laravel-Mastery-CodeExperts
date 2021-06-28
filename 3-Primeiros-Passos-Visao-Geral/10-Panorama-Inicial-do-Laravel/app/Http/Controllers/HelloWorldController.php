<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function helloworld()
    {
        return view('hello');
    }

    public function hello($name = 'Anônimo')
    {
        return 'Hello, ' . $name;
    }
}
