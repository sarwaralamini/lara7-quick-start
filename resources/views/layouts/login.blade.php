<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ucwords(str_replace(['-', '_'], ' ', config('app.name'))) }} | Login</title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/style.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Lara7 Quick Start</h1>
      </div>
      <div class="login-box">
        @yield('content')
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('assets/backend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('assets/backend/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/backend/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('assets/backend/js/plugins/pace.min.js')}}"></script>
  </body>
</html>
