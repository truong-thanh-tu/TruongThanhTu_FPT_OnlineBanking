<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    {{--  @include('public.component.linkCSS')--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('scss/_contact.scss') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>
<body onload="aminalLoadPage()">


<!--================Header Menu Area =================-->
@include('public.component.header')
<!--================Header Menu Area =================-->
<!--================ Start Content Area =================-->
@yield('content')
<!--================ End Content Area  =================-->
<!--================ start footer Area  =================-->
@include('public.component.footer')
<!--================ End footer Area  =================-->

<!--================Loader Area =================-->
<div id="preloader">
    <div class="loader">
        <img src="{{ asset('img/loader.gif') }}" alt="#"/>
    </div>
</div>
<!--================Loader Area =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--@include('public.component.linkScript')--}}
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/stellar.js') }}"></script>
<script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
<script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('vendors/counter-up/jquery.counterup.js') }}"></script>
<script src="{{ asset('js/mail-script.js') }}"></script>
<script src="{{ asset('vendors/popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendors/swiper/js/swiper.min.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="{{ asset('js/gmaps.js') }}"></script>

<script language="javascript">
    function aminalLoadPage(){
        document.getElementById('preloader').style.display ='flex';
        setTimeout(function (){
            document.getElementById('preloader').style.display ='none';
        },1000);


    }
</script>

</body>
</html>
