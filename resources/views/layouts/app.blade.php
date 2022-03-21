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
<!-- /Loader -->
@include('layouts.inc._aside')
<!-- main-content -->
<div class="main-content app-content">
@include('layouts.inc._header')
<!-- container -->
    <div class="container-fluid">
@yield('page-header')
@yield('content')
{{--@include('layouts.sidebar')--}}
{{--@include('layouts.models')--}}
<!-- Footer opened -->
{{--    <div class="main-footer ht-40">--}}
{{--        <div class="container-fluid pd-t-0-f ht-100p">--}}
{{--            <span>Copyright © 2020 <a href="#">Valex</a>. Designed by <a href="https://www.spruko.com/">Spruko</a> All rights reserved.</span>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Footer closed -->
@include('layouts.inc._script')

@include('layouts.inc._messages')
</body>
</html>
