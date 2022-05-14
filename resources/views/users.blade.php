@extends('layout')
@section('title', 'Usuários')
@section('content')
    @include('includes.menu')

    <div class="row">
        <div class="col">   
            <a href="{{ route('usuariosnovo') }}" class="btn btn-success mb-3">Novo</a>
            <table class="table table-hover talbe-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <form onsubmit="return confirmDelete();" action="{{ route('usuariosdelete', ['id'=> $user->id]) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <a href="{{ route('usuariosform', ['id'=> $user->id]) }}" class="btn btn-info">Editar</a>
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>    
        </div>
    </div> 
@endsection