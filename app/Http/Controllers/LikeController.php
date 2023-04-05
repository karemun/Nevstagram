<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store(Request $request, Post $post)
    {
        //Almacena el user_id y la publicacion donde se dio like
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function destroy(Request $request, Post $post)
    {
        //Se busca el post donde esta el like y se elimina
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
