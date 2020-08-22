@extends('Layout.master')
@section('title')
    CÀI ĐẶT HẠN MỨC CHUYỂN KHOẢN
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                CÀI ĐẶT HẠN MỨC CHUYỂN KHOẢN
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Hạn mức chuyển khoản</th>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           aria-label="Username" aria-describedby="addon-wrapping">

                                    <div class="input-group-append">
                                        <select class="browser-default custom-select">
                                            <option value="1">VND</option>
                                            <option value="1">USD</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Địa chỉ Email nhận mã OTP</th>
                            <td><span class="input-group-text">nguyenvana@example.com</span></td>
                        </tr>
                        <tr>
                            <th>Mã kiểm tra</th>
                            <td><span class="input-group-text w-25" id="codeCheck">THSKo</span></td>
                        </tr>
                        <tr>
                            <th>Nhập lại dãy số trên</th>
                            <td><input type="password" class="form-control w-25"
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
