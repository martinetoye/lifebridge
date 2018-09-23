@extends('master.master')

@section('content')
  <!-- MAIN -->
    <main>
        <div class="container">
            <!--content head-->
            <div class="lb-content-head">
              @if(Route::currentRouteName('home'))
                <h1>The Most
                  <div class="lb-content-head__popularity-btn">
                    <span>Recent </span>
                  </div>
                  Posts
                  </h1>
              @else
                <h1>Posts on gaming, sorted by
                    <div class="lb-content-head__popularity-btn">
                        <span>popularity</span>
                        <div class="lb-content-head__popularity-content">
                            <div class="lb-content-head__popularity-head">
                                <span>Popularity</span>
                                <span>Currently Selected</span>
                            </div>
                            <div class="lb-content-head__popularity-body">
                                <ul>
                                    <li><a href="#">Newest first</a></li>
                                    <li><a href="#">Highest scoring</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </h1>
              @endif
            </div>
            <!--sections-->
            <div class="masonry">
                @forelse($posts as $post)
                  @if($post->post_type == 'default')
                    @include('posts.type.default')
                  @elseif($post->post_type == 'link')
                    @include('posts.type.link')
                  @elseif($post->post_type == 'image')
                    @include('posts.type.image')
                  @elseif($post->post_type == 'embed')
                    @include('posts.type.embed')
                  @elseif($post->post_type == 'reshare')
                    @include('posts.type.reshare')
                  @endif

                @empty
                  No posts Found
                @endforelse

        </div>
    </main>
@endsection
