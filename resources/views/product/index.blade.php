@extends('layout')

@section('content')

<div class="wrapper">

    @include('navbar')

    @include('sidebar')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Продукты</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Поиск по параметрам</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('search_product') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-3">
                      <input type="text" name="name" class="form-control" placeholder="Названия">
                    </div>
                    <div class="col-3">
                      <input type="text" name="price_from" class="form-control" placeholder="Цена от">
                    </div>
                    <div class="col-3">
                      <input type="text" name="price_to" class="form-control" placeholder="Цена до">
                    </div>
                    <div class="col-3" name="type">
                      <select class="form-control" name="type">
                        <option value="Без разницы">Без разницы</option>
                        <option value="Новый">Новый</option>
                        <option value="Б/У">Б/У</option>
                      </select>
                    </div>
                    <div class="col-12" style="margin-top: 12px;">
                        <button type="submit" class="btn btn-primary btn-block">Поиск</button>
                    </div>
                  </form>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-12">

                <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Тип</th>
                            <th>Продавец</th>
                            <th>Магазин</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $item)
                          
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->get_seller->name }}</td>
                                <td>{{ $item->get_seller->market }}</td>
                            </tr>

                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
</div>
@endsection