<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        // $this->authorize('user-can-access');

         $posts = \App\Models\Post::all(['id', 'title']);
         return view('post', compact('posts'));

//        $this->authorize('post.index');
//        return 'POSTS....';

    }

    public function edit($id)
    {
        $post = \App\Models\Post::find($id);

        // Este metodo verifica o controle/ability/permissao e dispara uma exception
        // causando um 403 Unauthorized
        // $this->authorize('user-can-edit', $post);

        //true se o usuário NAO é permitido
        // Gate::denies('user-can-edit', $post);

        // true se o usuário é permitido
        // Gate::allows('user-can-edit', $post);

        if (!Gate::allows('update', $post)) {
            //die('VOcê não tem permissão para acessar');
            abort(403, 'Não tens autorização');
        }
        // dd(Gate::allows('update', auth()->user()));

        return "EDIT POSTs.....";
    }
}
