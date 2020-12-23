@extends('frontpage.layout')

@section('content')

        <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
              <div class="post-thumbnail"><img src="{{$article->img}}" alt="..." class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category"><a href="#">{{$roles = App\Models\Category::find($article->cat_id)->name}}</a></div>
                </div>
                <h1>{{$article->title}}</h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="title"><span>{{$article->author}}</span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i>{{date("d.m.Y", strtotime($article->created_at))}}</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
                <div class="post-body">
                  {{$article->content}}
                </div>
                <div class="text-right mt-3">
                      <strong>Поділитися в соц.мережах:</strong><br>
                      {!!$social!!}
                </div>
                
                <div class="post-comments">
                  
                  <header>
                    <h3 class="h6">Коментарі<span class="no-of-comments">{{count($comments)}}</span></h3>
                  </header>



                  @foreach($comments as $comment)

                  <div class="comment" id="comment-{{$comment->id}}">
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        <div class="image"></div>
                        <div class="title"><strong>{{$comment->guest_name}}</strong><span class="date">{{date("d.m.Y", strtotime($comment->created_at))}}</span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      <p>{{$comment->comment}}</p>
                    </div>
                    <div style="margin-left:10px;" class="text-right">
                                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample-{{$comment->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Відповісти
                                    </a>
                                    <div class="collapse" id="collapseExample-{{$comment->id}}">
                                      <div class="card card-body">
                                        <form class="commenting-form" id="comment-form" method="post" action="/replies/store" >
                                        {{ csrf_field() }}
                                        <div class="row">
                                         
                                          <div class="form-group col-md-6">
                                            <input type="hidden" name="comment_id" id="username" value="{{$comment->id}}">
                                            <input type="hidden" name="comment_owner" id="username" value="{{$comment->guest_name}}">
                                            <input type="text" name="guest_name" id="username" placeholder="Ім'я" class="form-control">
                                          </div>
                                          <div class="form-group col-md-6">
                                            <input type="email" name="guest_email" id="useremail" placeholder="Email (не буде опублікований)" class="form-control">
                                          </div>
                                          <div class="form-group col-md-12">
                                            <textarea name="reply" id="comment" placeholder="Ваша відповідь" class="form-control"></textarea>
                                          </div>
                                          <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-secondary">Відповісти</button>
                                          </div>
                                        </div>
                                        </form>
                                      </div>
                    </div> 
                    <div style="margin-left:10px;">

                                    
                                    <!-- Dynamic Reply form -->
                                    
                                </div>
                                @foreach($comment->replies as $rep)
                                     @if($comment->id === $rep->comment_id)
                                        <div class="comment text-left" style="margin-left:40px;" id="reply-{{$rep->id}}">
                                        <div class="comment-header d-flex justify-content-between">
                                          <div class="user d-flex align-items-center">
                                            <div class="title"><strong>{{ $rep->name }}</strong><span class="date">23.12.2020</span></div>
                                            </div>
                                      </div>
                                      <div class="comment-body">
                                        <p> {!! $rep->reply !!}</p>
                                      </div>
                                    </div>
                                    <div style="margin-left:10px;" class="text-right">
                                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample-{{$rep->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Відповісти
                                    </a>
                                    <div class="collapse" id="collapseExample-{{$rep->id}}">
                                      <div class="card card-body">
                                        <form class="commenting-form" id="comment-form" method="post" action="/replies/replysaver" >
                                        {{ csrf_field() }}
                                        <div class="row">
                                          <input type="hidden" name="reply_id" value="{{$rep->id}}">
                                          <input type="hidden" name="reply_name" value="{{$rep->name}}">
                                          <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                          <div class="form-group col-md-12">
                                            <input type="text" name="guest_name" id="username" placeholder="Ім'я" class="form-control">
                                          </div>
                                          <div class="form-group col-md-12">
                                            <textarea name="reply" id="comment" placeholder="Ваш коментар" class="form-control"></textarea>
                                          </div>
                                          <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-secondary">Відповісти</button>
                                          </div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>                                                          
                                </div>
                                    @endif 
                                @endforeach
                                
                        </div>
                  </div>
                  @endforeach
                </div>
                <div class="add-comment">
                  <header>
                    <h3 class="h6">Залишити коментар</h3>
                  </header>
                  <form class="commenting-form" id="comment-form" method="post" action="/comments/store" >
                    {{ csrf_field() }}
                    <div class="row">
                      <input type="hidden" name="article_id" value="{{$article->id}}">
                      <div class="form-group col-md-6">
                        <input type="text" name="guest_name" id="username" placeholder="Ім'я" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <input type="email" name="guest_email" id="useremail" placeholder="Email (не буде опублікований)" class="form-control">
                      </div>
                      <div class="form-group col-md-12">
                        <textarea name="comment" id="comment" placeholder="Ваш коментар" class="form-control"></textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary">Залишити коментар</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Пошук по блогу</h3>
            </header>
            <form action="/search" method="POST" class="search-form">
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
          <!-- Widget [Tags Cloud Widget]-->
          <div class="widget tags">       
            <header>
              <h3 class="h6">Теги</h3>
            </header>
            <ul class="list-inline">
              @foreach($tags as $tag)
              <li class="list-inline-item"><a href="#" class="tag">#{{$tag}}</a></li>
              @endforeach
            </ul>
          </div>
        </aside>
      </div>
    </div>


@endsection
