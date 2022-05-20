<nav class="col-3 mb-2 navbar-expand-lg navbar-light bg-light">
    <a href="{{ route('index') }}" class="navbar-brand">Home</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nbContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nbContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{ route('index') }}" class="nav-link">
                    Postagens
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('categorias') }}" class="nav-link">
                    Login
                </a>
            </li>
        </ul>
    </div>
</nav>