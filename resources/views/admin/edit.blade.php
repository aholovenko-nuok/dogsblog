@extends('admin.layout')

@section('content')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3" style="padding: 50px 0; border: none;">
          <form class="col-md-8" style="margin: 0 auto" method="POST" action="/admin/articles/{{$article->id}}" enctype="multipart/form-data">
            {{ method_field('PATCH')}}
            {{ csrf_field() }}
            <div class="form-group">
              <label>Назва статті</label>
              <input type="text" name="title" class="form-control" value="{{$article->title}}">
            </div>
            <div class="form-group">
              <label>Коротке описання</label>
              <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="4" >{{$article->description}}</textarea>
            </div>
            <div class="form-group">
              <label>Контент</label>
              <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$article->content}}</textarea>
            </div>
            <div class="form-group">
              <label>Теги</label><br>
              <input type="text" name="tags" class="form-control"  value="{{$article->tags}}" data-role="tagsinput" />
            </div>  
            <div class="form-group">
              <label>Категорія</label>
              <select name="cat_id" class="form-control form-control">
               @foreach($categories as $cat) 
                  @if($article->cat_id == $cat->id)
                  <option value="{{$cat->id}}" selected="selected">{{$cat->name}}</option>
                  @else
                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endif
                  @endforeach
               </select>
            </div>
            <div class="text-center">
               <button type="submit" class="btn btn-primary mt-4">Оновити</button>
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
