@extends('master.master')
@section('content')
  <!-- MAIN -->
    <main>
        <div class="container">
            <!--content head-->
            <div class="lb-head-user">
                <div class="lb-head-user__content">
                    <div class="lb-head-user__image"><a href="#"><img src="{{ Storage::url('userfiles/avatars/'. $user->avatar) }}" alt=""></a></div>
                    <div class="lb-head-user__info">
                        <div class="lb-head-user__info-head">
                            <div class="lb-head-user__name"><span>{{ $user->username }}</span> <i><img src="fonts/icons/sharehub/svg/Verified.svg" alt=""></i></div>
                            <div class="lb-head-user__icons">
                                <i><img src="fonts/icons/sharehub/svg/Badge_01.svg" alt=""></i>
                                <i><img src="fonts/icons/sharehub/svg/Badge_02.svg" alt=""></i>
                                <i><img src="fonts/icons/sharehub/svg/Badge_03.svg" alt=""></i>
                            </div>
                            @if($user->id == Auth::user()->id)

                            @else
                              <a href="{{ route('follow', $user->id)}}" class="lb-head-user__btn-follow lb-btn">
                                @if(auth()->user()->isFollowing($user))
                                    UnFollow
                                @else
                                    Follow
                                @endif
                              </a>
                            @endif
                        </div>
                        <div class="lb-head-user__info-statistic">
                            <div class="lb-btn-icon"><i class="icon-Post"></i><span>{{ $user->posts->count() }}</span></div>
                            <div class="lb-btn-icon"><i class="icon-Followers"></i><span>{{ $user->followers()->get()->count() }}</span></div>
                            <div class="lb-btn-icon"><i class="icon-Following"></i><span>238</span></div>
                            <div class="lb-btn-icon"><i class="icon-Upvote"></i><span></span></div>
                        </div>
                        <p>{{ $user->about }}</p>
                    </div>
                </div>
            </div>
            <div class="lb-content-head">

                <div class="lb-content-head__btns">
                    <a href="#" class="lb-btn lb-content-head__btn-submit">Submitted Posts</a>
                    <a href="#" class="lb-btn lb-content-head__btn-comments">Comments</a>
                    <a href="#" class="lb-btn lb-content-head__btn-favorites">Favorites</a>
                </div>

            </div>
            <!--sections-->
            <div class="lb-section__wrap row">

            </div>
        </div>
    </main>
    <!-- FOOTER -->
<footer>
    <div class="lb-footer">
        <a href="#" class="lb-footer__more-btn">
            <span class="icon-Scroll_Down"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>
            <p>Scorll down to load more posts</p>
        </a>
    </div>
</footer>
@endsection
