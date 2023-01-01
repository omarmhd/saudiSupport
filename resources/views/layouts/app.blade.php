

{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    @include('layouts.inc._head')--}}
{{--</head>--}}

{{--<body class="main-body app sidebar-mini">--}}
{{--@include('layouts.inc.modals.show_order')--}}
{{--@include('layouts.inc.modals.chat')--}}

{{--<audio id="audio" >--}}
{{--    <source src="https://assets.mixkit.co/sfx/preview/mixkit-interface-option-select-2573.mp3" type="audio/mpeg"> Your browser does not support the audio element.--}}
{{--</audio>--}}
{{--<!-- Loader -->--}}
{{--<div id="global-loader">--}}
{{--    <img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">--}}
{{--</div>--}}
{{--<!-- /Loader -->--}}
{{--@include('layouts.inc._aside')--}}
{{--<!-- main-content -->--}}
{{--<div class="main-content app-content">--}}
{{--@include('layouts.inc._header')--}}
{{--<!-- container -->--}}
{{--    <div class="container-fluid">--}}
{{--@yield('page-header')--}}
{{--@yield('content')--}}
{{--@include('layouts.sidebar')--}}
{{--@include('layouts.models')--}}
{{--<!-- Footer opened -->--}}
{{--    <div class="main-footer ht-40">--}}
{{--        <div class="container-fluid pd-t-0-f ht-100p">--}}
{{--            <span>Copyright © 2020 <a href="#">Valex</a>. Designed by <a href="https://www.spruko.com/">Spruko</a> All rights reserved.</span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Footer closed -->--}}
{{--@include('layouts.inc._script')--}}

{{--@include('layouts.inc._messages')--}}
{{--@include('layouts.inc.modals._passdata')--}}

{{--</body>--}}
{{--</html>--}}
    <!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    @include('layouts.inc._head')

</head>
<body>
<div class="container">
    <header class="p-3 mb-3 border-bottom border-success border-4 " style="background: #cdc9c9">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <div CLASS="col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ">

                    {{date('Y.m.d')}}

                </div>

                {{--                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">--}}
                {{--                    <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>--}}
                {{--                    <li><a href="#" class="nav-link px-2 link-dark">Inventory</a></li>--}}
                {{--                    <li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>--}}
                {{--                    <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>--}}
                {{--                </ul>--}}



                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset("assets/businessman.png")}}" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item active" href="/">Home</a></li>
                        <li><a class="dropdown-item" href="{{route('users.index')}}">users</a></li>
                        <li><a class="dropdown-item" href="{{route('departments.index')}}">departments</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i> Sign Out</a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>


<div class="container" style="height: 100vh">

    @yield('content')
</div>
<div class="container">
    <div class="row text-center p-4" style="background-color:#cdc9c9;  ;bottom: 0px ;" >

        <a class="text-reset fw-bold" href="">Saudi Gamers team</a>
    </div>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @include('layouts.inc._script')
        @include("layouts.inc._messages")
</html>
