@extends('layout')

@section('content')

<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h1"> {{ env('APP_NAME') }} </a>
        </div>
        <div class="card-body">

            <form action="{{ route('login') }}" method="post">
                @csrf

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <div>{{ $error }}</div>
                    </div>
                @endforeach

                <div class="input-group mb-3">
                    <input type="string" name="name" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <button type="submit" class="btn btn-outline-secondary btn-block col-12">Войти</button>

                    <a href="/registration" class="btn btn-primary btn-block col-12">
                    Зарегистрироваться
                    </a>

                </div>
            </form>

        </div>
    </div>
</div>

@endsection