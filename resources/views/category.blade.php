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
            <div class="col-lg-10">
                <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="{{$category->name}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                <label for="active">Ativo</label>
                    <select name="active" id="active" class="form-control">
                        <option value="0" {{ !$category->active ? 'selected' : ''}}>Não</option>
                        <option value="1" {{ $category->active ? 'selected' : ''}}>Sim</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description}}</textarea>
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