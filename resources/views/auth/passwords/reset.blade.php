@extends('master.master')

@section('content')
  <!-- HEADER -->
  <header>

  </header>
  <!-- MAIN -->
  <main>
      <div class="lb-login">
          <div class="lb-login__logo"></a></div>
          <div class="lb-login__content">
              <p>Login with </p>
              <div class="lb-login__form">
                  <form action="{{ route('password.request') }}" method="POST">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                      <input id="email" name="email" type="text" class="form-control" placeholder='Email' required autofocus>

                      <input id="password" name="password" type="password" class="form-control" placeholder='Password' required>

                      <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder='Password' required>
                      
                      <div class="lb-login__send">
                          <button type="submit" class="lb-btn">Reset</button>
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
