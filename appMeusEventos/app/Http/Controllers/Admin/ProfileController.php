<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfimeRequest;
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

    public function update(ProfimeRequest $request)
    {
        $userData = $request->get('user');
        $profile = $request->get('profile');

        if($userData['password']){
            $userData['password'] = bcrypt($userData['password']);
        }else{
            unset($userData['password']);
        }

        $user = auth()->user();
        $user->update($userData);

        $user->profile()->update($profile);

        \App\Services\MessageService::addFlash('success', 'Perfil Atualizado com sucesso');

        return redirect()->route('admin.profile.edit');

    }
}
