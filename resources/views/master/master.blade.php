<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lifebridge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- STYLESHEET -->
    <!-- FONTS -->
    <!-- Muli -->
    <link href="https://fonts.googleapis.com/css?family=Signika:300,400,600,700" rel="stylesheet">
    <script data-main="/js/app.js" src="{{ url('/vendor/require/require.js') }}"></script>

    <!-- icon -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/fonts/icons/fontawesome/css/font-awesome.min.css')}}"/>

    <link rel="stylesheet" href="{{ url('/fonts/icons/sharehub/style.css') }}"/>

    <link rel="stylesheet" href="{{ url('vendor/datePicker/css/datepicker.css') }}"/>


    <!-- Vendor -->
  <!-- Custom -->
  <link rel="stylesheet" href="{{ url('/vendor/magnificPopup/dist/magnific-popup.css') }}"/>
  <link href="{{ url('/css/master.css') }}" rel="stylesheet"/>
  </head>
  <body>
      @if(Route::currentRouteName() == 'login')

      @elseif(Route::currentRouteName() == 'register')
      @elseif(Route::currentRouteName() == 'password.request')
      @elseif(Route::currentRouteName() == 'password.reset')
      @else
        @include('master.header')
      @endif

      @include('messages.master')

      @yield('content')


  </body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="{{ url('/js/app.js') }}"></script>

@yield('pagescript')
</html>
