@extends('Layout.master')
@section('title')
    THÔNG TIN TÀI KHOẢN
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                THÔNG TIN CHI TIẾT CỦA TÀI KHOẢN
            </div>
            <div class="informationAccount">
                <div class="detailInformationAccount ">
                    <table class="table table-light ">
                        <tbody>
                        <tr>
                            <th>Số tài khoản</th>
                            <td>0123245689898</td>
                        </tr>
                        <tr>
                            <th>Loại tài khoản</th>
                            <td>Tiền gửi thành toán</td>
                        </tr>
                        <tr>
                            <th>Số dư hiện tại</th>
                            <td>12.200.300 VND</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
