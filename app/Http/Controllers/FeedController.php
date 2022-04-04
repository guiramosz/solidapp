<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FeedController extends Controller
{
    //Carregamento das postagens
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard',['posts'=>$posts]);
    }

    //Grava a postagem pelo o formulario da tela feed
    public function store(Request $request)
    {
        $user = auth()->user();

        $post = new Post;
        $post->id_user = $user->id;
        $post->imagem = $request->imagem;
        $post->titulo = $request->titulo;
        $post->conteudo = $request->conteudo;
        $post->local = $request->local;
        $post->link = $request->link;

        $post->save();
        return redirect('dashboard');

    }

}
/* $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('imagem');
            $table->string('titulo');
            $table->text('conteudo');
            $table->string('local');
            $table->string('link'); */
