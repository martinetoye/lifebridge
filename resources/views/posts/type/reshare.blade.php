<?php
Use App\User;
Use App\Post;
Use Embed\Embed;
$origin_user = User::find($post->origin_user_id);
$origin_post = Post::find($post->origin_post_id);

if(!empty($origin_post->embed_link)){
$embed = Embed::create($origin_post->embed_link);
}
 ?>
<!--section-->
<div class="item lb-section__item">
    <div class="lb-section">
    <div class="lb-section__head">
        <a href="{{ route('profile', $post->user->username)}}" class="lb-section__avatar lb-avatar"><img class="lb-avatar" src="{{ Storage::url('userfiles/avatars/'. $post->user->avatar)}}" alt=""></a>
        <div>
          <a href="{{ route('profile', $post->user->username)}}" class="lb-section__name">{{ $post->user->username }}</a>
          <span class="lb-section__passed">{{ $post->created_at->diffForHumans() }}</span>
        </div>
        @if(Auth::id() == $post->user_id)
        <a href="{{route('post.edit', $post->id)}}" class="lb-section__link lb-btn-icon"><i class="fa fa-ellipsis-v"></i></a>
      @endif
    </div>
    <div class="lb-section__repost">
      <div class="lb-section__head">
          <a href="#" class="lb-section__avatar lb-avatar"><img class="lb-avatar" src="{{ Storage::url('userfiles/avatars/' . $origin_user->avatar)}}" alt=""></a>
          <div>
              <a href="#" class="lb-section__name">{{$origin_user->username }}</a>
              <span class="lb-section__passed">{{ $origin_post->created_at->diffForHumans() }}</span>
          </div>
        <a href="{{ route('post.reshare', $origin_post->id)}}" class="lb-section__link-repost lb-btn-icon"><i class="icon-Repost"></i></a>
      </div>
      <div class="lb-section__content">
          <p>{{ $origin_post->body }}</p>
          @if($origin_post->has_image == 1)
          <div class="lb-section__image">
              <a href="{{ route('post.single')}}"><img src="{{ Storage::url('uploads/posts/'. $post->post_image)}}" alt=""></a>
          </div>
          @endif

          @if(!empty($origin_post->embed_link))
              @if(empty($embed->code))
                <div class="lb-section__image">
                    @if(!empty($embed->image))
                    <a href="{{ $embed->url }}"><img src="{{ $embed->image }}" alt=""></a>
                    @else
                    @endif
                    <div class="lb-section__image-info">
                        <div>{{ $embed->title }}</div>
                        <p>{{ str_limit($embed->description, 150, '...') }}</p>
                        <span><a href="{{ $embed->url }}">{{ $embed->url }}</a></span>
                    </div>
                </div>
              @else
                <div class="lb-embed-content">
                    {!! $embed->code !!}
                </div>
              @endif
          @endif
      </div>
    </div>
    <div class="lb-section__footer">
      {{-- This is the Upvote Button it will switch wether user has upvoted or not --}}
      @if(Auth::user()->hasUpVoted($post->id, 'App\Post'))
        <a href="{{ route('post.vote.cancel', $post->id)}}" class="lb-section__btn-upvote lb-btn-icon like"><i class="fa fa-check"></i></a>
      @else
        <a href="{{ route('post.vote', $post->id)}}" class="lb-section__btn-upvote lb-btn-icon"><i class="icon-Upvote"></i></a>
      @endif
      {{-- This is the Like button. This will check to see if user has liked or not --}}
        <a href="{{ route('post.like', $post->id)}}" class="lb-section__btn-like lb-btn-icon">
          @if(Auth::user()->hasLiked($post->id, 'App\Post'))
          <i class="icon-Favorite_Full liked"></i><span>{{ $post->likers()->get()->count()}}</span></a>
        @else
            <i class="icon-Favorite_Full"></i><span>{{ $post->likers()->get()->count()}}</span></a>
        @endif
        <a href="{{ route('post.single', $post->id)}}" class="lb-section__btn-comment lb-btn-icon"><i class="icon-Comment_Full"></i><span>982</span></a>
        <a href="#" class="lb-section__btn-share lb-btn-icon"><i class="icon-Share"></i></a>
    </div>
</div>
</div>
