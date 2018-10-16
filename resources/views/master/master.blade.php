<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lifebridge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- STYLESHEET -->
    <!-- FONTS -->
    <!-- Muli -->
    <link href="https://fonts.googleapis.com/css?family=Signika:300,400,600,700" rel="stylesheet">

    <!-- icon -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/fonts/icons/fontawesome/css/font-awesome.min.css')}}"/>

    <link rel="stylesheet" href="{{ url('/fonts/icons/sharehub/style.css') }}"/>


  <link href="{{ url('/css/master.css') }}" rel="stylesheet"/>
  </head>
  <?php $auth_user = Auth::user() ?>
<!-- Remove on Production Release -->
<script>
  window.auth_user = {!! json_encode($auth_user)!!};
</script>

  <body>

      @if(Route::currentRouteName() == 'login')

      @elseif(Route::currentRouteName() == 'register')
      @elseif(Route::currentRouteName() == 'password.request')
      @elseif(Route::currentRouteName() == 'password.reset')
      @else
        @include('master.header')
      @endif

      @include('messages.master')
      <div id="app">
        @yield('content')
      </div>



  </body>

<script src="{{ url('/js/app.js') }}"></script>


@yield('pagescript')
</html>
