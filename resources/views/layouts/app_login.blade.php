<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{URL::asset('assets/login.css')}}" rel="stylesheet">

    @include('layouts.inc._head')

</head>

<body  style="  ;
    display: flex;
    justify-content: flex-start;
    position: relative;">
<!-- Loader -->


@yield('content')



<script src="{{URL::asset('assets/login.js')}}"> </script>

</body>



</html>
