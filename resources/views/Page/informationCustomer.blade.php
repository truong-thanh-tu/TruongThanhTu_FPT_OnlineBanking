@extends('Layout.master')
@section('title')
    THÔNG TIN CÁ NHÂN
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                Thông Tin Cá Nhân
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Tên khách hàng</th>
                            <td><input type="text" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Ngày sinh</th>
                            <td><input type="date" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Chứng minh thư/Hộ chiếu</th>
                            <td><input type="text" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Địa chị</th>
                            <td><input type="text" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Số điện thoại liên hệ</th>
                            <td><input type="text" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="email" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Lĩnh vực nghề nghiệm</th>
                            <td><input type="text" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Nơi làm việc</th>
                            <td><input type="text" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Chức vụ</th>
                            <td><input type="text" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Thu nhập trung bình năm</th>
                            <td><input type="text" class="form-control"
                                       aria-label="Username" aria-describedby="addon-wrapping"></td>
                        </tr>
                        <tr>
                            <th>Sở thích</th>
                            <td><input type="text" class="form-control"
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
