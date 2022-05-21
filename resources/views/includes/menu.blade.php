<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><a href="{{ route('categorias') }}" class="nav-link link-dark px-2">Categorias</a></li>
        <li class="nav-item"><a href="{{ route('posts') }}#" class="nav-link link-dark px-2">Postagens</a></li>
      </ul>
      <ul class="nav col-10">
        <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link link-dark mb-3">Logout</a></li>
      </ul>
    </div>
  </nav>