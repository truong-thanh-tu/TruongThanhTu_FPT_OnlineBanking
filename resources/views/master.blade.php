<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đôi Mật Khẩu</title>

    <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>

    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.12.1-web/css/all.css') }}">

</head>
<body>

{{-- Menu Section Begin--}}
<div class="menu">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand icon" href="#"><i class="fas fa-university"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Thông tin Tài Khoản/Thẻ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Chuyển tiền</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lịch sử</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Báo cáo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hỗ trợ</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</div>

{{-- Main Section Begin--}}
<div class="main mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="fast_access">
                    <div class="card w-100">
                        <div class="card-header">
                            <span><i class="fas fa-fast-forward mr-2"></i></span> <span>Truy Cập Nhanh</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href=""><span><i
                                            class="fas fa-chevron-right mr-2"></i></span>
                                    <span>Danh sách tài khoản</span></a></li>
                            <li class="list-group-item"><a href=""><span><i
                                            class="fas fa-chevron-right mr-2"></i></span> <span>Chuyển tiền trong OnlineBanking</span></a>
                            </li>
                            <li class="list-group-item"><a href=""><span><i
                                            class="fas fa-chevron-right mr-2"></i></span> <span>Chuyển tiền tới ngân hàng khác</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="my_banking mt-3">
                    <div class="card w-100">
                        <div class="card-header">
                            <span><i class="fas fa-user-alt mr-2"></i></span> <span>OnlineBanking của tôi</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href=""><span><i
                                            class="fas fa-chevron-right mr-2"></i></span> <span>Thông tin cá nhân</span></a>
                            </li>
                            <li class="list-group-item"><a href=""><span><i
                                            class="fas fa-chevron-right mr-2"></i></span>
                                    <span>Cài đặt người ngưởi</span></a></li>
                            <li class="list-group-item"><a href=""><span><i
                                            class="fas fa-chevron-right mr-2"></i></span> <span>Cài đặt hạn mức chuyển tiền</span></a>
                            </li>
                            <li class="list-group-item"><a href=""><span><i
                                            class="fas fa-chevron-right mr-2"></i></span> <span>Đôi mật khẩu</span></a>
                            </li>
                            <li class="list-group-item"><a href=""><span><i
                                            class="fas fa-chevron-right mr-2"></i></span> <span>Caì đặt phương thức nhận OTP</span></a>
                            </li>
                            <li class="list-group-item"><a href=""><span><i
                                            class="fas fa-chevron-right mr-2"></i></span> <span>Thoát</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="content p-3">
                    <div class="alert alert-primary text-center" role="alert">
                        Đổi mật khẩu
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Tên truy cập</th>
                                    <td><input type="text" class="form-control"
                                               aria-label="Username" aria-describedby="addon-wrapping"></td>
                                </tr>
                                <tr>
                                    <th>Mật khẩu hiện tại</th>
                                    <td><input type="password" class="form-control"
                                               aria-label="Username" aria-describedby="addon-wrapping"></td>
                                </tr>
                                <tr>
                                    <th>Mật khẩu mới</th>
                                    <td><input type="password" class="form-control"
                                               aria-label="Username" aria-describedby="addon-wrapping"></td>
                                </tr>
                                <tr>
                                    <th>Nhập lại mật khẩu</th>
                                    <td><input type="password" class="form-control"
                                               aria-label="Username" aria-describedby="addon-wrapping"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="confirm text-right mt-3">
                        <a class="btn " href="#" role="button">XÁC NHẬN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Footer Section Begin--}}
<div class="footer">
    © 2020 Online Bank.
</div>
<!-- Script -->
<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/myScripts.js') }}"></script>

</body>
</html>
