@extends('Layout.master')
@section('title')
    CHUYỂN TIỀN
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                CHUYỂN TIỀN CHO NGƯỜI HƯỠNG TẠI ONLINEBANKING
            </div>
            <div class="transferInBank">
                <form action="{{ Route('EnterCodeOPT') }}">
                    <div class="section1">
                        <div class="title">
                            <h5>THÔNG TIN NGƯỜI CHUYỂN</h5>
                        </div>
                        <div class="content bg-white">
                            <table class="table">
                                <tr>
                                    <th class="w-50">Tài khoản</th>
                                    <td class="w-50"><span>123456789654</span></td>
                                </tr>
                                <tr>
                                    <th class="w-50">Số dư khả dụng</th>
                                    <td class="w-50"><span>12.200.000 VND</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="section2">
                        <div class="title mt-3">
                            <h5>THÔNG TIN NGƯỜI HƯỞNG</h5>
                        </div>
                        <div class="content bg-white">
                            <table class="table">
                                <tr>
                                    <th class="w-50">Số tài khoản</th>
                                    <td class="w-50"><span>123456789654</span></td>
                                </tr>
                                <tr>
                                    <th class="w-50">Tên người thụ hưởng</th>
                                    <td class="w-50 text-danger">Nguyen Van A</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="section3">
                        <div class="title mt-3">
                            <h5>THÔNG TIN GIAO DỊCH</h5>
                        </div>
                        <div class="content bg-white">
                            <table class="table">
                                <tr>
                                    <th class="w-50">Số tiền</th>
                                    <td class="w-50 text-danger"><span>500.000 VND</span></td>
                                </tr>
                                <tr>
                                    <th class="w-50">Số tiền bằng chữ</th>
                                    <td class="w-50"><span>Năm trâm nghìn đồng</span></td>
                                </tr>
                                <tr>
                                    <th class="w-50">Nội dung chuyển tiền</th>
                                    <td class="w-50"><span>Chuyển tiền nhanh</span></td>
                                </tr>
                                <tr>
                                    <th class="w-50">Phi chuyển chuyển</th>
                                    <td class="w-50"><span>Người chuyển trả</span></td>
                                </tr>
                                <tr>
                                    <th class="w-50">Số tiền phí</th>
                                    <td class="w-50"><span>3.300 VND</span></td>
                                </tr>
                                <tr>
                                    <th class="w-50">Hình thức nhận mã OTP</th>
                                    <td class="w-50">
                                        <select class="custom-select">
                                            <option value="1">Gửi Qua Mail</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <th class="w-50">Email nhận mã OTP</th>
                                    <td class="w-50"><span>nguyenvana@gmail.com</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="section4 mt-5 text-right">
                        <a class="btn back mr-3"  href="#" role="button">Quay lại</a>
                        <button type="submit" class="btn">Xác Nhận</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
