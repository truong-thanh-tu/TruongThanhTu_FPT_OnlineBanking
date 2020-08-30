<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/icon-web.png') }}" type="image/png">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
     @include('component.linkCSS')

</head>
<body onload="aminalLoadPage()">


<!--================Header Menu Area =================-->
    @include('component.headerPublic')
<!--================Header Menu Area =================-->

<!--================ Start Content Area =================-->
    @yield('content')
<!--================ End Content Area  =================-->

<!--================ start footer Area  =================-->
    @include('component.footer')
<!--================ End footer Area  =================-->

<!--================Loader Area =================-->
{{--<div id="preloader">
    <div class="loader">
        <img src="{{ asset('img/loader.gif') }}" alt="#"/>
    </div>
</div>--}}
<!--================Loader Area =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include('component.linkScript')
</body>
</html>
