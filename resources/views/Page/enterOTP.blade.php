@extends('Layout.master')
@section('title')
    CHUYỂN TIỀN
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                XÁC NHẬN MÃ OTP
            </div>
            <div class="transferInBank">
                <div class="section1">
                    <div class="content bg-white">
                        <div class="text">
                            <p>Mã OTP đã được gửi đến gmail của bạn </p>
                            <p>Quy khách vui lòng kiểm tra gmail và nhập mã OTP để thực hiện giao dịch</p>
                        </div>
                        <form action="{{ Route('SuccessTransfer') }}" method="get">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn my-2 my-sm-0 mr-2" type="submit">Xác Nhận</button>
                                </div>
                                <input type="text" class="form-control w-50" name="otp" placeholder="Username"
                                       aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
