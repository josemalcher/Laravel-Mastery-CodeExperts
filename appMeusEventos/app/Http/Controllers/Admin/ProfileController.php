<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

//        if(!$user->profile){
//            $user->profile()->create([
//                'about' => ''
//            ]);
//        }

        return view('admin.profile', compact('user'));
    }

    public function update()
    {
        dd(request()->all());
    }
}
