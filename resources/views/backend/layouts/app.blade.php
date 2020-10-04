<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Lara7 Quick Start') }} - @yield('title')</title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/style.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Dinamic style -->
    @stack('css')
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    @include('backend.layouts.inc.header')
    <!-- Sidebar menu-->
    @include('backend.layouts.inc.sidebar')

    <main class="app-content">
      @yield('content')
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('assets/backend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('assets/backend/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/bootstrap-notify-3.1.3.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <!-- Dinamic JS -->
    @stack('js')

    @if(session('errorMessage'))
        <script>
            $.notify({
                title: "Error : ",
                message: '{{ session('errorMessage') }}'
            },{
                type: "danger",
                placement: {
                    from: "top",
                    align: "right"
                }
            });
        </script>
    @endif

    @if(session('successMessage'))
        <script>
            $.notify({
                title: "Success : ",
                message: '{{ session('successMessage') }}'
            },{
                type: "success",
                placement: {
                    from: "top",
                    align: "right"
                }
            });
        </script>
    @endif
  </body>
</html>
