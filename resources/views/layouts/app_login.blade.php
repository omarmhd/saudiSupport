<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{URL::asset('assets/login.css')}}" rel="stylesheet">
</head>

<body class="main-body app sidebar-mini">
<!-- Loader -->
<div id="global-loader">
    <img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<div class="main-content app-content">
@yield('content')

</div>

<script src="{{URL::asset('assets/login.js')}}"> </script>

</body>



</html>
