@extends('layout')

@section('content')

<div class="register-box">

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h1"> {{ env('APP_NAME') }} </a>
        </div>
        <div class="card-body">

        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="customer-tab" data-toggle="pill" href="#customer" role="tab" aria-controls="customer" aria-selected="true">Покупатель</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="saler-tab" data-toggle="pill" href="#saler" role="tab" aria-controls="saler" aria-selected="false">Продавец</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade active show" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                        
                        <form action="{{ route('registation_customer') }}" method="post">

                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    <div>{{ $error }}</div>
                                </div>
                            @endforeach

                            @csrf
                            <div class="input-group mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Логин">
                            </div>
                            <div class="input-group mb-3">
                                <input name="password" type="password" class="form-control" placeholder="Пароль">
                            </div>
                            
                            <div class="row">
                                <button type="submit" class="btn btn-primary btn-block col-12">Регистрация</button>
                            </div>
                        </form>
    
                    </div>
                    <div class="tab-pane fade" id="saler" role="tabpanel" aria-labelledby="saler-tab">
                        
                        <form action="{{ route('registation_seller') }}" method="post">
                            @csrf

                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    <div>{{ $error }}</div>
                                </div>
                            @endforeach

                            <div class="input-group mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Логин">
                            </div>

                            
                            <div class="input-group mb-3">
                                <input name="password" type="password" class="form-control" placeholder="Пароль">
                            </div>
                            
                            <div class="input-group mb-3">
                                <input name="market" type="text" class="form-control" placeholder="Названия магазина">
                            </div>

                            <!-- /.col -->
                            <div class="row">
                                <button type="submit" class="btn btn-primary btn-block col-12">Регистрация</button>
                            </div>
                        </form>
    
                    </div>
                </div>
            </div>
            
        </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>

@endsection