@extends('layout')
@section('title', 'Noticias BG')
@section('content')
    @include('includes.index')

<div class="row">
        <div class="col">   
            <table class="table table-hover talbe-bordered">
                <tr>
                    <th>Título</th>
                    <th>Resumo</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <tr class="table-secondary">
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->summary }}</td>
                    </tr>
                @endforeach
            </table>    
        </div>
    </div> 