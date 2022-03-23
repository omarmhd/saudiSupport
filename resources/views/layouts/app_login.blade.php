<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.inc._head')
</head>

<body class="main-body app sidebar-mini">
<!-- Loader -->
<div id="global-loader">
    <img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<div class="main-content app-content">
@yield('content')

</div>

@include('layouts.inc._script')

@include('layouts.inc._messages')

</body>



</html>
