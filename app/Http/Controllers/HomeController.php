<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Se llama automaticamente
    public function __invoke()
    {
        $ids = auth()->user()->followings->pluck('id')->toArray();          //Se obtiene a los usuarios que seguimos
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(16);    //Se obtienen los post de esos usuarios, se muestran primero recientes


        return view('home', [
            'posts' => $posts
        ]);
    }
}
