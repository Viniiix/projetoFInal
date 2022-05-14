@extends('layout')
@section('title', 'Formulário de Usuário')
@section('content')
    @include('includes.menu')

<div class="row'">
    <div class="col-lg-12">
    @include('includes.errors')
    @if($user->id)
    <form action="{{ route('usuariosupdate', ['id' => $user->id]) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
    @else
    <form action="{{ route('usuariosinsert') }}" method="POST">
    @endif
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Para manter a senha atual, basta não preencher o campo">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="from-group">
                    <label for="password_confirmation">Confirmar a senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('usuarios') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection