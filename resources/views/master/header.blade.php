<!-- HEADER -->
<header>
    <div class="lb-header">
        <div class="container">
            <a href="{{ route('home')}}" class="lb-logo">
              <h2 class="lb-logo-text">Lifebridge</h2>
            </a>
            <div class="lb-header__btn-dropdown lb-btn-icon"><i class="icon-Arrow_Down" onClick=''></i></div>
            <ul class="lb-header__dropdown">

                <li><a href="{{ route('home')}}">Home</a></li>

                @if(Auth::check())
                  <li><a href="{{ route('profile.update', Auth::user()->username)}}">Settings</a></li>
                  <li><a href=""
                    onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                     logout
                    </a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

              @else
                    <li><a href="{{ route('login')}}">Login</a></li>
                    <li><a href="{{ route('register')}}">Signup</a></li>
              @endif

            </ul>
            <script>
                require(['app'], function () {
                    require(['modules/menu']);
                });
            </script>
            <nav>
                <ul class="lb-header__menu">
                    <li>
                        <a href="#">Categories</a>
                        <div class="lb-header__nav">
                            <div class="container">
                                <ul>
                                    @foreach($tags as $tag)
                                      @if($loop->iteration <= 5)
                                      <li><a href="#{{$tag->slug}}">{{ $tag->name }}</a></li>
                                    @endif
                                    @endforeach
                                </ul>
                                <ul>
                                    @foreach($tags as $tag)
                                      @if($loop->iteration >= 6 && $loop->iteration <= 10)
                                        <li><a href="#">{{ $tag->name }}</a></li>
                                      @endif
                                    @endforeach
                                </ul>
                                <ul>
                                  @foreach($tags as $tag)
                                    @if($loop->iteration >= 11 && $loop->iteration <= 15)
                                      <li><a href="#">{{ $tag->name }}</a></li>
                                    @endif
                                  @endforeach
                                </ul>
                                <ul>
                                  @foreach($tags as $tag)
                                    @if($loop->iteration >= 16 && $loop->iteration <= 20)
                                      <li><a href="#">{{ $tag->name }}</a></li>
                                    @endif
                                  @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#">Trending</a>
                        <div class="lb-header__nav">
                            <div class="container">
                                <ul>
                                    <li><a href="#">New Releases</a></li>
                                    <li><a href="#">Popular</a></li>
                                    <li><a href="#">Top 50</a></li>
                                    <li><a href="#">Upcoming</a></li>
                                    <li><a href="#">Gaming News</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">XBOX One</a></li>
                                    <li><a href="#">Play Station 4</a></li>
                                    <li><a href="#">PC</a></li>
                                    <li><a href="#">Handheld</a></li>
                                    <li><a href="#">Walkthrough</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">Game Reviews</a></li>
                                    <li><a href="#">Cancelled Games</a></li>
                                    <li><a href="#">Mobile Games</a></li>
                                    <li><a href="#">Free Games</a></li>
                                    <li><a href="#">Discount Codes</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">Game Wiki</a></li>
                                    <li><a href="#">Cheat Coddes</a></li>
                                    <li><a href="#">Contests</a></li>
                                    <li><a href="#">Giveaways</a></li>
                                    <li><a href="#">Hardware</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="lb-header__search">
                <form action="#">
                    <label>
                        <input type="search" name="global-search" class="form-control" placeholder="Search Posts, hashtags, categoires">
                        <i class="icon-Search"></i>
                    </label>
                </form>
            </div>
            <div class="lb-header__control">
              @if(Auth::check())
                <a href="#" class="lb-header__btn-like lb-btn-icon"><i class="icon-Favotire_empty"></i></a>
                <a href="#" class="lb-header__btn-comment lb-btn-icon"><i class="icon-Comment"></i></a>
                <a href="#" class="lb-header__btn-notification lb-btn-icon"><i class="icon-Notification"></i></a>
                <a href="{{ route('profile', Auth::user()->username)}}" class="lb-header__avatar"><img class="lb-avatar" src="{{ Storage::url('userfiles/avatars/'. Auth::user()->avatar)}}" alt=""></a>

                <a href="#" class="lb-header__btn-upload lb-btn"><i class="icon-Upvote"></i> Upload</a>

            </div>



    @endif
        </div>
    </div>

    @include('modals.upload')
    <script>
        require(['app'], function () {
            require(['modules/main']);
            require(['modules/upload']);
        });
    </script>

</header>
