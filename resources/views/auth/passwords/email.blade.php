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
              <p>Reset Password </p>

              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              <div class="lb-login__form">
                  <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                      <input id="email" name="email" type="text" class="form-control" placeholder='Email' required autofocus>

                      <div class="lb-login__send">
                        <div class=""></div>
                          <button type="submit" class="lb-btn">Reset</button>
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
