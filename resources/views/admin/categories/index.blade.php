@extends('admin.layout')

@section('content')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Категорії <a class="btn btn-success" style="float: right;" href="/admin/categories/create">Додати категорію</a> </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Назва категорії</th>
                    <th>Редагувати категорію</th>
                    <th>Видалити категорію</th>
                  </tr>
                </thead>
                <tbody>
                  @if($categories->count())
                  @foreach($categories as $category)
                  <tr>
                    <td><a href="/admin/categories/{{$category->id}}">{{$category->name}}</a></td>
                    <td class="text-center"><a class="btn btn-success" href="/admin/categories/{{$category->id}}/edit">Редагувати</a></td>
                    <td class="text-center"><a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal-{{$category->id}}">Видалити</a></td>
                  </tr>
                  <!-- Delete Modal-->
      <div class="modal fade" id="deleteModal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ви впевнені, що хочете видалити категорію?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Відміна</button>
              <form method="POST" action="/admin/categories/@if(isset($category->id)){{$category->id}}@endif">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <div class="field">

                <div class="control">
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
                  @endforeach()
                  @else
                  <td colspan ="4">Статей у базі данних не знайдено. Оновіть дані</td>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

      <!-- /.container-fluid -->

@endsection
