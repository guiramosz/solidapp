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

        if($request->file('imagem') != null)
        {
            //Cria uma string única baseada no slug do nome do usuári
            $slug = Str::of($user->name)->slug('-');
            $string = md5($request->file('imagem')->getClientOriginalName());
            if($request->file('imagem')->isValid())
            {
                $nameFile = $slug . $string . '.' . $request->file('imagem')->extension();
                $request->file('imagem')->storeAs('imagens', $nameFile);
                $post->imagem = 'imagens/' . $nameFile;
            }
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
