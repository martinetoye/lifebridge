@extends('master.master')

@section('content')
  <!-- HEADER -->
  <header>

  </header>

  <!-- MAIN -->
  <main>
      <div class="lb-login">
          <div class="lb-login__logo"></div>
          <div class="lb-login__content">
              <p>Sign up with Lifebridge</p>
              <div class="lb-login__form">
                  <form action="{{ route('register') }}" method="POST">
                    @csrf
                      <input id="name" type="text"  name="name" class="form-control" placeholder='Enter name' required autofocus>
                      @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                      <input id="username" type="text"  name="username" class="form-control" placeholder='Username' required autofocus>
                      @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                      @endif
                      <input id="email" type="email" name="email" class="form-control" placeholder='Email' required>
                      @if ($errors->has('email'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                      <input id="password" type="password" name="password" class="form-control" placeholder='Password' required>
                      @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder='Retype Password' required>
                      <div class="lb-login__send">
                          <a href="{{ route('login')}}">Already have an account?</a>
                          <button type="submit" class="lb-btn">Sign up</button>
                      </div>
                      <div class="lb-login__footer">
                          <p>or with Social Network</p>
                          <div class="lb-login__social">
                              <a href="" class="lb-btn-social__facebook lb-btn-social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                              <a href="" class="lb-btn-social__twitter lb-btn-social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                              <a href="" class="lb-btn-social__google lb-btn-social"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </main>

  <!-- FOOTER -->
  <footer>
      <div class="lb-footer">
          <div class="container">
              <p class="text-center">Terms & Conditons . Privacy Policy</p>
          </div>
      </div>
  </footer>
@endsection
