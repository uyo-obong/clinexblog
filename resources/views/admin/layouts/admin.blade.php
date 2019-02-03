<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Clinex Dashboard </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="{{asset('admins/css/bootstrap.min.css')}}" rel="stylesheet" />

  <!-- Animation library for notifications   -->
  <link href="{{asset('admins/css/animate.min.css')}}" rel="stylesheet"/>

  <!--  Paper Dashboard core CSS    -->
  <link href="{{asset('admins/css/paper-dashboard.css')}}" rel="stylesheet"/>


  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="{{asset('admins/css/demo.css')}}" rel="stylesheet" />


  <!--  Fonts and icons     -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
  <link href="{{asset('admins/css/themify-icons.css')}}" rel="stylesheet">

  <script src='https://cdn.jsdelivr.net/npm/tinymce@4.9.3/tinymce.min.js'></script>
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>

</head>
<body>

  <div class="wrapper">
    @include('admin.sidebar')
    <div class="main-panel">
     @include('admin.navbar')
     @yield('dashboard')
     @include('admin.footer')
   </div>

 </div>


</body>
</html>