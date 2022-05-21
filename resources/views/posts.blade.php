@extends('layout')
@section('title', 'Postagens')
@section('content')
    @include('includes.menu')

    <style>
        .limite{
            max-width: 10px;
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis;
        }
    </style>

    <div class="row">
        <div class="col-12">   
            <a href="{{ route('postsnovo') }}" class="btn btn-success mb-2">Novo</a>
            <table class="table table-hover">
                <tr>
                    <th>Data da Postagem</th>
                    <th>Categoria</th>
                    <th>Título</th>
                    <th>Resumo</th>
                    <th>Texto</th>
                    <th>Ativo?</th>
                    <th>Ações</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <tr class="table">
                        <td class="limite">{{ $post->post_date }}</td>
                        <td class="limite">{{ $post->category->name }}</td>
                        <td class="limite">{{ $post->title }}</td>
                        <td class="limite">{{ $post->summary }}</td>
                        <td class="limite">{{ $post->text }}</td>
                        <td>{{ $post->active == 0 ? 'Não' : 'Sim'}}</td>
                        <td>
                            <form action="{{ route('postsdelete', ['id'=> $post->id]) }}" method="POST">
                                <a href="{{ route('postsform', ['id'=> $post->id]) }}" class="btn btn-info">Editar</a>
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>    
        </div>
    </div> 
@endsection