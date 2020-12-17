@extends('admin.layout')

@section('content')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3" style="padding: 50px 0; border: none;">
          <form class="col-md-8" style="margin: 0 auto" method="POST" action="/admin/user/{{$user->id}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-group">
              <label>Ваш логін</label>
              <input type="text" name="name" class="form-control" value="{{$user->name }}">
            </div>
            <div class="form-group">
              <label>Ваш Email</label>
              <input type="email" name="email" class="form-control" value="{{$user->email }}">
            </div>
            <div class="form-group">
              <label>Ваш Аватар</label>
              {!! Form::uploadcare('img', $user->img, array('data-crop' => '3:3')) !!}
            </div>
            <div class="form-group">
              <label>Новий пароль</label>
              <input id="password" type="password" name="password" class="form-control" value="">
            </div>
          </div>
            <div class="text-center">
               <button type="submit" class="btn btn-primary mt-4">Зберегти</button> 
            </div>

          </form>
          {!! Uploadcare::scriptTag() !!}
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->


@endsection