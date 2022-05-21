@extends('layout')
@section('title', 'Noticias BG')
@section('content')
    @include('includes.index')

    <style>
        .limite{
            max-width: 400px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden; 
            text-overflow: ellipsis;
        }
        .limiteLi{
            max-width: 100%;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden; 
            text-overflow: ellipsis;
        }
    </style>

<body>
<div class="container py-3">
  <header>
    <div class="pricing-header p-3 pb-md-5 mx-auto text-center">
      <h1 class="display-4 fw-normal">Últimas Postagens</h1>
    </div>
  </header>

  <main>
  
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    @foreach($posts as $post)
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">{{ $post->title }}</h4>
          </div>
          <div class="card-body">
            <h3 class="card-title pricing-card-title limite">{{ $post->summary }}<small class="text-muted fw-light"></small></h3>
            <ul class="list-unstyled mt-3 mb-4">
              <li class="list-unstyled mt-3 mb-5 limiteLi">{{ $post->text }}</li>
              <li class="limiteLi">{{ $post->category->name }}</li>
            </ul>
          </div>
        </div>
      </div>
    @endforeach
  </main>

</div>
</body>