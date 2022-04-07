<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Post;


class FeedController extends Controller
{
    //Carregamento das postagens
    public function index()
    {
        $posts = Post::join('users', 'users.id', '=','posts.id_user')
        ->orderBy('created_at', 'desc')
        ->get(['posts.*', 'users.name']);
        
        return view ('dashboard', ['posts' => $posts]);
    }

    //Grava a postagem pelo o formulario da tela feed
    public function store(Request $request)
    {
        $user = auth()->user();

        $post = new Post;
        $post->id_user = $user->id;
        $post->titulo = $request->titulo;
        $post->conteudo = $request->conteudo;
        $post->local = $request->local;
        $post->link = $request->link;

        //upload de imagens
        if($request->hasfile('imagem') && $request->file('imagem')->isValid())
        {
            $requestImage = $request->imagem;
            $extensao = $requestImage->extension();
            //nome do arquivo inicia com nome do usuário
            $nomeImagem = $user->name . md5($requestImage->getClientOriginalName()) . '.' . $extensao;
            $request->imagem->move(public_path('imagens'), $nomeImagem);
            $post->imagem = $nomeImagem;
        }

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
