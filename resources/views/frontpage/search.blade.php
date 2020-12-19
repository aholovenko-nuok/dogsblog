@extends('frontpage.layout')

@section('content')
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
              <!-- post -->
              @if(count($articles) < 1)
                  <h4>По запиту <strong style="color: blue">{{$search}}</strong> немає результатів</h4>
              @endif
              @foreach($articles as $article)
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="/articles/{{$article->id}}"><img src="{{$article->preview}}" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{date("d.m.Y", strtotime($article->created_at))}}</div>
                    <div class="category"><a href="#">{{$roles = App\Models\Category::find($article->cat_id)->name}}</a></div>
                  </div><a href="/articles/{{$article->id}}">
                    <h3 class="h4">{{$article->title}}</h3></a>
                  <p class="text-muted">{{$article->description}}</p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="title"><span>{{$article->author}}</span></div></a>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                  </footer>
                </div>
              </div>
              @endforeach
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Пошук по блогу</h3>
            </header>
            <form action="/articles/search" method="POST" class="search-form">
              {{ csrf_field() }}
              <div class="form-group">
                <input type="search" name="search" placeholder="Пошук">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Categories Widget]-->
          <div class="widget categories">
            <header>
              <h3 class="h6">Категорії</h3>
            </header>
            @foreach($categories as $category)
            <div class="item d-flex justify-content-between"><a href="/categories/{{$category->id}}">{{$category->name}}</a><span>{{count($articles->where('cat_id', $category->id))}}</span></div>
            @endforeach
          </div>
        </aside>
      </div>
    </div>
@endsection    