<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Revisa que el usuario este autenticado antes de redirigirlo a index
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user) 
    {
        return view('dashboard', [
            'user' => $user         //Pasa la informacion del usuario
        ]);
    }

    public function create() 
    {
        //dd('Creando post...');
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:100',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        //Forma 1 de crear
        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,
        ]);

        /* //Forma 2 de crear
        $post = new Post;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id;
        $post->save(); */

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
