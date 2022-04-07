@extends('layouts.app')

@section('titulo', 'Feed')

@section('conteudo')

<style>
    .botao-flutuante{
        display:block;
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 70px;
        height: 70px;
        border: none;
        font-size: 35px;
        color: #fff;
        border-radius: 50%;
        box-shadow: 5px 5px 5px #aaa;
    }

</style>

@if(count($posts) == 0)
<p class="text-center">
    Não há postagens ainda
</p>
@else

<!-- Feed -->
@foreach ($posts as $post)
<div class="card mb-4">
    <h5 class="card-header">{{$post->name}}</h5>
    @if($post->imagem != null)
    <img src="imagens/{{$post->imagem}}" class="card-img-top">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{$post->titulo}}</h5>
        <p class="card-text">{{$post->conteudo}}</p>
        <h6 class="card-title">Local</h6>

        <!-- Botões compartilhar, comentar e curtir  -->
        <div class="d-flex justify-content-between">
            <a href="#" class="link-post"><i class="fal fa-share fa-2x"></i></a>

            <a href="#" class="link-post"><i class="fal fa-comment fa-2x"></i></a>

            <!-- <a href="#" class="link-post"><i class="fal fa-heart fa-2x"></i></a> -->
            <!-- <i class="fas fa-heart fa-2x"></i> -->
        </div>

        <!-- Campo comentarios  -->
        <hr>
        <textarea placeholder="Digite algo..." name="comentarios" id="comentario" rows="3" class="form-control"></textarea>
        
        <!-- Botão enviar comentario  -->
        <div class="d-flex  bd-highlight">
            <a href="#" class="link-post mt-3"><i class="fal fa-paper-plane fa-2x"></i></a>
        </div>

    </div>
</div>
@endforeach
<!-- Final feed  -->

@endif

<button type="button" class="botao-flutuante bg-danger"
data-bs-toggle="modal" data-bs-target="#modalFormulario">
+
</button>

<div class="modal fade" id="modalFormulario" tabindex="-1"
aria-labelledby="modalFormularioLabel" aria-hidden="true">
    <div class="col-md-8 offset-md-2">
        <div class="modal-dialog bg-white">
            <div class="modal-header">
                <h2>Nova postagem</h2>
            </div>
            <div class="modal-content">
                <form action="{{route('new_post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Imagem  -->
                    <input      class="form-control me-2 mb-3" name="imagem"    id="imagem" type="file" placeholder="Selecione uma imagem...">
                    <!-- Týtulo  -->
                    <input      class="form-control me-2 mb-3" name="titulo"    id="titulo" type="text" placeholder="Digite o título..." required>
                    <!-- Conteúdo  -->
                    <textarea   class="form-control me-2 mb-3" name="conteudo"  id="conteudo" cols="30" placeholder="Digite o conteúdo..." required rows="5"></textarea>
                    <!-- Local -->
                    <input      class="form-control me-2 mb-3" name="local"     id="local"  type="text" placeholder="Digite o local...">
                    <!-- Link  -->
                    <input      class="form-control me-2 mb-3" name="link"      id="link"   type="url"  placeholder="Digite o link...">
                    
                    <!-- Botão enviar post  -->
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <button type="submit" class="btn btn-outline-success" type="submit">Enviar</button>
                    </div>
                    <!-- Final botão enviar post  -->
                </form>
            </div>
        </div>
    </div>
    
</div>


@endsection
