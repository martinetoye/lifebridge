<?php
use Embed\Embed;
$embed = Embed::create($post->embed_link);
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
        <div class="lb-section__content">
            <p>{{ $post->body }}</p>
                        <!--<source src="https://www.youtube.com/embed/z8lDreq9le4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>-->
                        <div class="lb-embed-content">
                            {!! $embed->code !!}
                        </div>
        </div>
        <div class="lb-section__footer">
          {{-- This is the Upvote Button it will switch wether user has upvoted or not --}}
          @if(Auth::user()->hasUpVoted($post->id, 'App\Post'))
            <a href="{{ route('post.vote.cancel', $post->id)}}" class="lb-section__btn-upvote lb-btn-icon like"><i class="fa fa-check"></i></a>
          @else
            <a href="{{ route('post.vote', $post->id)}}" class="lb-section__btn-upvote lb-btn-icon"><i class="icon-Upvote"></i></a>
          @endif

            <a href="{{ route('post.reshare', $post->id)}}" class="lb-section__btn-repost lb-btn-icon"><i class="icon-Repost"></i></a>
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
