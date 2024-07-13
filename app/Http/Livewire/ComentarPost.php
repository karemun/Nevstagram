<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comentario;

class ComentarPost extends Component
{
    public $post;
    public $comentario;
    public $comentarios;

    public function mount($post)
    {
        $this->post = $post;
        $this->comentarios = $post->comentarios()->latest()->get();
    }

    public function comentar()
    {
        $this->validate([
            'comentario' => 'required|max:255'
        ]);

        // Almacenar
        $nuevoComentario= Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comentario' => $this->comentario
        ]);

        $this->comentarios->prepend($nuevoComentario);
        $this->reset('comentario');

        return back()->with('mensaje', 'Comentario realizado correctamente');
    }

    public function render()
    {
        return view('livewire.comentar-post');
    }
}
