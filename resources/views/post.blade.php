@extends('layout')
@section('title', 'Formulário de Postagem')
@section('content')
    @include('includes.menu')

<div class="row'">
    <div class="col-lg-12">
    @include ('includes.errors')    
    @if($post->id)
    <form action="{{ route('postsupdate', ['id' => $post->id]) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
    @else
    <form action="{{ route('postsinsert') }}" method="POST">
    @endif
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <label for="post_date">Data da Postagem</label>
                <input type="datetime-local" class="form-control" id="post_date" name="post_date" value="{{ $post->post_date }}">
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Selecione</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ ($post->category_id == $category->id) ? 'selected' : '' }}>
                                {{ $category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                    </div>
                </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="active">Ativo?</label>
                    <select name="active" id="active" class="form-control">
                        <option value="1" {{ $post->active ? 'selected' : ''}}>Sim</option>
                        <option value="0" {{ !$post->active ? 'selected' : ''}}>Não</option>
                    </select>
                </div>
            </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="summary">Resumo</label>
                        <input type="text" class="form-control" name="summary" id="summary" value="{{ $post->summary}}">
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="text">Texto</label>
                    <textarea name="text" id="text" class="form-control">{{ $post->text}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('posts') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection