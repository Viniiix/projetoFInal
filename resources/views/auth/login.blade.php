@extends('layout')
@section('title', 'Login')
@section('content')
<style>
  body{
    display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
  }

</style>

<body>
  <main class="container4">
    <center><img class="mb-4" src="https://i.imgur.com/GRmcb46.png" alt="" width="100" height="100"></center>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" id="email" name="email" 
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" id="password" name="password"
                                class="form-control"> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-block btn-success">
                            Login
                        </button>
                    </div>
                </div>
            </form>
  </main>
        </div>
    </div>
  </body>
@endsection