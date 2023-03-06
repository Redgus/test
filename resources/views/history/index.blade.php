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
                <h1>История</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            
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
                            <th>Пользователь</th>
                            <th>Цена от</th>
                            <th>Цена до</th>
                            <th>Тип</th>
                            <th>Дата</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($items as $item)
                          
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->get_user->name }}</td>
                                <td>{{ $item->name ? $item->name : "Не указано" }}</td>
                                <td>{{ $item->price_from ? $item->price_from : "Не указано" }}</td>
                                <td>{{ $item->price_to ? $item->price_to : "Не указано" }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->created_at }}</td>
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