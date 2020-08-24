<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Nhập</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon_logo.png') }}"/>


    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.12.1-web/css/all.css') }}">

</head>
<body>

{{-- Login Section Begin--}}

<div class="login" style="background-image: url(img/background/BG-Login.jpg)">
    <div class="mainLogin">
        <div class="logo-icon">
            <i class="fas fa-university"></i>
        </div>
        <form action="{{ Route('Login') }}" method="get">
            <div class="title">
                <h4>Đăng Nhập</h4>
            </div>
            <div class="form-label-group  mt-5 mb-3">
                <input type="text" id="inputUser" class="form-control" name="user" placeholder="Tên Đăng Nhập">
            </div>
            <div class="form-label-group mt-1 mb-3">
                <input type="password" id="inputPass" class="form-control" name="pass" placeholder="Mật Khẩu" >
            </div>
            <div class="checkbox  mt-4 mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Nhớ mật khẩu
                </label>
            </div>
            <button class="btn btn-lg btn-block" id="btn_login" onclick="btnLogin()" type="submit">Đăng Nhập</button>
       @csrf
        </form>
    </div>
</div>

<!-- Script -->
<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/myScripts.js') }}"></script>

</body>
</html>
