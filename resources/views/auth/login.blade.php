@extends('layout')
@section('title', 'Login')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" id="email" name="email" 
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
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
        </div>
    </div>
@endsection