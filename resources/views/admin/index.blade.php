@extends('admin.layout')

@section('content')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Пам'ятки <a class="btn btn-success" style="float: right;" href="/admin/articles/create">Додати статтю</a></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Назва статті</th>
                    <th>Зображення</th>
                    <th>Редагувати статтю</th>
                    <th>Видалити статтю</th>
                  </tr>
                </thead>
                <tbody>
                  @if($articles->count())
                  @foreach($articles as $article)
                  <tr>
                    <td><a href="/places/{{$article->slug}}">{{$article->title}}</a></td>
                    <td><img src="img/{{$article->post_thumbnail}}" style="width: 100px;" alt=""></td>
                    <td class="text-center"><a class="btn btn-success" href="/admin/articles/{{$article->id}}/edit">Редагувати</a></td>
                    <td class="text-center"><a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal-{{$article->id}}">Видалити</a></td>
                  </tr>
                  <!-- Delete Modal-->
      <div class="modal fade" id="deleteModal-{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ви впевнені, що хочете видалити пям'ятку?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Відміна</button>
              <form method="POST" action="/admin/articles/@if(isset($article->id)){{$article->id}}@endif">
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
