<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    public function mount($post) //Constructor, se ejecuta solo
    {
        //Revisa si el usuario ya le dio like
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        //Si el usuario ya le dio like
        if($this->post->checkLike(auth()->user())) 
        {
            $this->post->likes()->where('post_id', $this->post->id)->delete(); //Se busca el post donde esta el like y se elimina
            $this->isLiked = false;
            $this->likes--;
        } else {
            //Almacena el user_id y la publicacion donde se dio like
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
