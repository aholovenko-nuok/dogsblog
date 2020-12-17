@extends('admin.layout')

@section('content')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Вставте посилання на сайт-джерело </div>
          <div class="card-body">
            <form action="/admin/get-data/create">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                        <input type="text" class="form-control" placeholder="Посилання" name="url"><button class="btn btn-primary">Далі</button>
                    </div>
            </form>
          </div>
        </div>

      </div>

      <!-- /.container-fluid -->

@endsection
