@extends('layout')
@section('title', 'Formulário de Categoria')
@section('content')
    @include('includes.menu')

<div class="row'">
    <div class="col-lg-12">
    @include ('includes.errors')
    @if($category->id)
    <form action="{{ route('categoriasupdate', ['id' => $category->id]) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
    @else
    <form action="{{ route('categoriasinsert') }}" method="POST">
    @endif
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $category->id }}">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" value="{{$category->title}}" class="form-control">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('categorias') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection