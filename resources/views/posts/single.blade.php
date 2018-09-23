<?php
Use Embed\Embed;

if(!empty($post->embed_link)){
$embed = Embed::create($post->embed_link);
}
if(!empty($other->embed_link)){
  $otherEmbed = Embed::create($other->embed_link);
}
 ?>

@extends('master.master')
@section('content')
  <!-- MAIN -->
  <main>
      <div class="container">
          <!--content head-->
          <div class="lb-content-head lb-content-head__flex-off">
              <div class="row">
                  <div class="col-lg-8">

                  </div>
                  <div class="col-lg-4">
                      <div class="lb-content-head__right-col">
                          <div class="lb-content-head__text">
                              <div>Related Posts</div>
                              <span>Sorted by Newest First</span>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
          <!--sections-->
          <div class="row">
              <div class="col-lg-8">
                  <!--section-->
                  <div class="lb-section">
                      <div class="lb-section__head">
                            <a href="{{ route('profile', $post->user->username)}}" class="lb-section__avatar lb-avatar"><img class="lb-avatar" src="{{ Storage::url('userfiles/avatars/'. $post->user->avatar)}}" alt=""></a>
                          <div>
                              <a href="{{ route('profile', $post->user->username )}}" class="lb-section__name">{{ $post->user->username }}</a>
                              <span class="lb-section__passed">{{ $post->created_at->diffForHumans() }}</span>
                          </div>
                          {{-- <a href="#" class="lb-section__link lb-btn-icon"><i class="icon-Link"></i></a> --}}
                      </div>
                      <div class="lb-section__content">
                          <p>{{ $post->body }}</p>
                          <div class="lb-section__image">
                            @if($post->has_image == 1)
                            <div class="lb-section__image">
                                <img src="{{ Storage::url('/uploads/posts/'. $post->post_image)}}" alt="">
                            </div>
                            @endif

                            @if(!empty($post->embed_link))
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
                          <a href="#" class="lb-section__btn-upvote lb-btn-icon"><i class="icon-Upvote"></i></a>
                          <a href="#" class="lb-section__btn-repost lb-btn-icon"><i class="icon-Repost"></i></a>
                          <a href="#" class="lb-section__btn-like lb-btn-icon"><i class="icon-Favorite_Full"></i><span>1,274</span></a>
                          <a href="#" class="lb-section__btn-comment lb-btn-icon"><i class="icon-Comment_Full"></i><span>982</span></a>
                          <div class="lb-section__btns-right">
                            {{--  <div class="lb-section__btn-stat lb-btn-icon">
                                  <i class="icon-Stat"></i>
                                  <div class="lb-statistic__arrow"></div>
                                  <div class="lb-statistic">
                                      <div class="lb-statistic__head">
                                          <p>Post Stats</p>
                                          <div class="lb-statistic__close lb-btn-icon"><i class="icon-Cancel"></i></div>
                                      </div>
                                      <div class="lb-statistic__content">
                                          <div id="curve_chart"></div>
                                      </div>
                                      <div class="lb-statistic__footer">
                                          <div class="lb-statistic__band">
                                              <i class="icon-Upvote"></i>
                                              <div class="lb-statistic__band-section">
                                                  <div style="width: 80%;"><span>9,217</span><span>395</span></div>
                                              </div>
                                              <i class="icon-Downvote"></i>
                                          </div>
                                          <a href="#">
                                              <i class="icon-Comment"></i>
                                              <span>214 Comments</span>
                                          </a>
                                          <a href="#">
                                              <i class="icon-Favotire_empty"></i>
                                              <span>347 Favorites</span>
                                          </a>
                                      </div>
                                  </div>
                              </div> --}}

                              <a href="#" class="lb-section__btn-options lb-btn-icon"><i class="icon-Options"></i></a>
                              <a href="#" class="lb-section__btn-share lb-btn-icon"><i class="icon-Share"></i></a>
                          </div>
                      </div>

                  </div>
                  @comments(['model' => $post])

                  @endcomments

              </div>
              <div class="col-lg-4">
                  <aside class="lb-aside">
                      @foreach($others as $other)
                        <!--section-->
                        <div class="lb-section">
                            <div class="lb-section__head">
                                  <a href="{{ route('profile', $other->user->username)}}" class="lb-section__avatar lb-avatar"><img src="{{ Storage::url('/userfiles/avatars/'. $other->user->avatar)}}" alt=""></a>
                                <div>
                                    <a href="{{ route('profile', $other->user->username )}}" class="lb-section__name">{{ $other->user->username }}</a>
                                    <span class="lb-section__passed">{{ $other->created_at->diffForHumans() }}</span>
                                </div>
                                {{-- <a href="#" class="lb-section__link lb-btn-icon"><i class="icon-Link"></i></a> --}}
                            </div>
                            <div class="lb-section__content">
                                <p>{{ $other->body }}</p>
                                <div class="lb-section__image">
                                  @if($other->has_image == 1)
                                  <div class="lb-section__image">
                                      <img src="{{ Storage::url('/uploads/posts/'. $other->post_image)}}" alt="">
                                  </div>
                                  @endif

                                  @if(!empty($other->embed_link))
                                      @if(empty($otherEmbed->code))
                                        <div class="lb-section__image">
                                            @if(!empty($otherEmbed->image))
                                            <a href="{{ $otherEmbed->url }}"><img src="{{ $otherEmbed->image }}" alt=""></a>
                                            @else
                                            @endif
                                            <div class="lb-section__image-info">
                                                <div>{{ $otherEmbed->title }}</div>
                                                <p>{{ str_limit($otherEmbed->description, 150, '...') }}</p>
                                                <span><a href="{{ $otherEmbed->url }}">{{ $otherEmbed->url }}</a></span>
                                            </div>
                                        </div>
                                      @else
                                        <div class="lb-embed-content">
                                            {!! $otherEmbed->code !!}
                                        </div>
                                      @endif
                                  @endif
                                </div>
                            </div>
                            <div class="lb-section__footer">
                              @if(Auth::user()->hasUpVoted($other->id, 'App\Post'))
                                <a href="{{ route('post.vote.cancel', $other->id)}}" class="lb-section__btn-upvote lb-btn-icon like"><i class="fa fa-check"></i></a>
                              @else
                                <a href="{{ route('post.vote', $other->id)}}" class="lb-section__btn-upvote lb-btn-icon"><i class="icon-Upvote"></i></a>
                              @endif
                                <a href="{{ route('post.reshare', $other->id)}}" class="lb-section__btn-repost lb-btn-icon"><i class="icon-Repost"></i></a>
                                <a href="{{ route('post.like', $other->id)}}" class="lb-section__btn-like lb-btn-icon">
                                  @if(Auth::user()->hasLiked($other->id, 'App\Post'))
                                  <i class="icon-Favorite_Full liked"></i><span>{{ $other->likers()->get()->count()}}</span></a>
                                @else
                                    <i class="icon-Favorite_Full"></i><span>{{ $other->likers()->get()->count()}}</span></a>
                                @endif
                                <a href="{{ route('post.single', $post->id)}}" class="lb-section__btn-comment lb-btn-icon"><i class="icon-Comment_Full"></i><span>982</span></a>
                                <div class="lb-section__btns-right">
                                    <a href="#" class="lb-section__btn-share lb-btn-icon"><i class="icon-Share"></i></a>
                                </div>
                            </div>

                        </div>
                      @endforeach
                  </aside>
              </div>
          </div>
      </div>
  </main>

@endsection
