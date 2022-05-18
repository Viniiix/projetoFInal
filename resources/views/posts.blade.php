@extends('layout')
@section('title', 'Postagens')
@section('content')
    @include('includes.menu')

    <div class="row">
        <div class="col">   
            <a href="{{ route('postsnovo') }}" class="btn btn-success mb-3">Novo</a>
            <table class="table table-hover talbe-bordered">
                <tr>
                    <th>Data da Postagem</th>
                    <th>Categoria</th>
                    <th>Título</th>
                    <th>Resumo</th>
                    <th>Texto</th>
                    <th>Ativo?</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <tr class="table-secondary">
                        <td>{{ $post->post_date }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->summary }}</td>
                        <td>{{ $post->text }}</td>
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