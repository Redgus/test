@extends('layout')

@section('content')

<div class="wrapper">

    @include('navbar')

    @include('sidebar')

    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Создать товар</h3>
                </div>
                
                <form action="{{ route('product_create') }}" method="POST">
                    @csrf

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <div>{{ $error }}</div>
                        </div>
                    @endforeach

                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="string" name="name" class="form-control" placeholder="Введите названия товара">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Цена</label>
                            <input type="number" name="price" class="form-control" placeholder="Введите цену товара">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Тип</label>
                            <select name="type" class="form-control">
                                <option>Новый</option>
                                <option>Б/У</option>
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>

            </div>
        </section>
    </div>
@endsection