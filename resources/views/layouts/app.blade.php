  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Clinex Blog</title>


    <!-- Styles -->
    <link href="{{ URL::to('admins/usercss/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::to('admins/usercss/blog-home.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
</head>
<body>
    <div id="app">
        @section('master-navbar')
        @include('inc.navbar')
        @show

        @section('single_navbar')
        @include('inc.single_navbar')
        @show

        <main class="py-4">
            @yield('content')
        </main>
        @include('footer')
    </div>
</body>
</html>
