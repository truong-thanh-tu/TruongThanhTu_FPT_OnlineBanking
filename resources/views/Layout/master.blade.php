<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đôi Mật Khẩu</title>
    {{--Icon Web--}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon_logo.png') }}"/>

    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.12.1-web/css/all.css') }}">

</head>
<body>

{{-- Menu Section Begin--}}
@include('Component.Menu')

{{-- Main Section Begin--}}
<div class="main mt-5">
    <div class="container">
        <div class="row">
            {{--Nav Section Begin--}}
            @include('Component.Nav')
{{--            Content Section Begin--}}
            @yield('Content')
        </div>
    </div>
</div>

{{--Footer Section Begin--}}
@include('Component.Footer   ')
<!-- Script -->
<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/myScripts.js') }}"></script>

</body>
</html>
