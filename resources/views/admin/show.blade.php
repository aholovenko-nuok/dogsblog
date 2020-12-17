@extends('admin.layout')

@section('content')

    <div id="content-wrapper">

      <div class="container pb-5">

        <!-- DataTables Example -->

        <div class="card mb-3" style="padding: 50px 0; border: none;">
           <h3 class="mb-4">{{$question->title}}</h3>
           <p>{{$question->content}}</p>
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
