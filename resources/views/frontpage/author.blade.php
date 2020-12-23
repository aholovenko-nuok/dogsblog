@extends('frontpage.layout')

@section('content')
    <!-- Latest Posts -->
    <section class="latest-posts pt-5"> 
      <div class="container">
        <header> 
          <h2 class="text-center">Про авторів</h2>
        </header>
        <div class="row">
          <div class="post col-md-6">
            <div class="post-thumbnail text-center"><img src="/images/anastasia.jpg" alt="..." class="img-fluid" width="250"></div>
            <div class="post-details text-center">

                <h3 class="h4 mt-2">Анастасія Головенко</h3></a>
              <h4 class="text-muted"> ІТ.м-01</h4>
            </div>
          </div>
          <div class="post col-md-6">
            <div class="post-thumbnail text-center"><a href="post.html"><img src="/images/ira.jpg" alt="..." class="img-fluid"  width="250"></a></div>
            <div class="post-details text-center">
              
                <h3 class="h4 mt-2">Ірина Каравай</h3></a>
              <h4 class="text-muted"> ІТ.м-01</p>
            </div>
          </div>
        </div>
      </div>
    </section>
 @endsection