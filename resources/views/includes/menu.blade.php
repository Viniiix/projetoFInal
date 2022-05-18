<nav class="mb-5 navbar-expand-lg navbar-light bg-light">
    <a href="{{ route('posts') }}" class="navbar-brand">Sistema</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nbContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nbContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{ route('categorias') }}" class="nav-link">
                    Categorias
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('posts') }}" class="nav-link">
                    Postagens
                </a>
            </li>
        </ul>
    </div>
</nav>