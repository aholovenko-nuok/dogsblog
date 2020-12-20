@extends('admin.layout')

@section('content')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3" style="padding: 50px 0; border: none;">
          <form class="col-md-8" style="margin: 0 auto" method="POST" action="/admin/categories" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Назва категорії</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="text-center">
               <button type="submit" class="btn btn-primary mt-4">Створити</button>
            </div>
          </div>


          </form>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Розроблено: Головенко А.О.,Каравай І.С., 2020</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->


@endsection
