<?php

namespace App\Http\Livewire;
use App\Models\Post;
use App\Models\Curtida;

use Livewire\Component;

class Curtidas extends Component
{
    public function render()
    {
        return view('livewire.curtidas');
    }

    //Método para gravar curtidas do BD
    public function like($idPost)
    {
        $post = Curtida::find($idPost);
        $post->likes()->create(['id_user' => auth()->user()->id]);
    }
    //Método para remover curtidas do BD
    public function unlike(Curtida $post)
    {
        $post->likes()->delete();
    }
}
