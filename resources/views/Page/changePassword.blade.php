@extends('Layout.master')
@section('Content')
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
                <button class="btn " href="#" role="button">XÁC NHẬN</button>
            </div>
        </div>
    </div>
@endsection
