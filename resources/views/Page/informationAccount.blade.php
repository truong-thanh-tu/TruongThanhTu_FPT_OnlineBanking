@extends('Layout.master')
@section('title')
    THÔNG TIN TÀI KHOẢN
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                THÔNG TIN TÀI KHOẢN
            </div>
            <div class="informationAccount">
                <div class="title">
                    <h5>Tiền gửi tiết kiệm</h5>
                </div>
                <div class="savedMoney ">
                    <table class="table table-light text-center">
                        <thead>
                        <tr>
                            <th scope="col">Số tài khoản</th>
                            <th scope="col">Loại tiền</th>
                            <th scope="col">Xem chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>0123245689898</td>
                            <td>VND</td>
                            <td><a href="{{ Route('DetailInformationAccount',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td>0123245689898</td>
                            <td>VND</td>
                            <td><a href="{{ Route('DetailInformationAccount',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td>0123245689898</td>
                            <td>VND</td>
                            <td><a href="{{ Route('DetailInformationAccount',1) }}">Xem chi tiết</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="title">
                    <h5>Tiền gửi thanh toán</h5>
                </div>
                <div class="savedMoney ">
                    <table class="table table-light text-center">
                        <thead>
                        <tr>
                            <th scope="col">Số tài khoản</th>
                            <th scope="col">Loại tiền</th>
                            <th scope="col">Xem chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>0123245689898</td>
                            <td>VND</td>
                            <td><a href="">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td>0123245689898</td>
                            <td>VND</td>
                            <td><a href="">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td>0123245689898</td>
                            <td>VND</td>
                            <td><a href="">Xem chi tiết</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="title">
                    <h5>Giao dịch gần đây</h5>
                </div>
                <div class="savedMoney ">
                    <table class="table table-light text-center">
                        <thead>
                        <tr>
                            <th scope="col">Ngày</th>
                            <th scope="col">Số tài khoản</th>
                            <th scope="col">Số tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>21/02/2020</td>
                            <td>189898989898</td>
                            <td> + 1.000.000 VND</td>
                        </tr>
                        <tr>
                            <td>21/02/2020</td>
                            <td>189898989898</td>
                            <td> + 1.000.000 VND</td>
                        </tr>
                        <tr>
                            <td>21/02/2020</td>
                            <td>189898989898</td>
                            <td> + 1.000.000 VND</td>
                        </tr>
                        <tr>
                            <td>21/02/2020</td>
                            <td>189898989898</td>
                            <td> + 1.000.000 VND</td>
                        </tr>
                        <tr>
                            <td>21/02/2020</td>
                            <td>189898989898</td>
                            <td> + 1.000.000 VND</td>
                        </tr>
                        <tr>
                            <td>21/02/2020</td>
                            <td>189898989898</td>
                            <td> + 1.000.000 VND</td>
                        </tr>
                        <tr>
                            <td>21/02/2020</td>
                            <td>189898989898</td>
                            <td> + 1.000.000 VND</td>
                        </tr>
                        <tr>
                            <td>21/02/2020</td>
                            <td>189898989898</td>
                            <td> + 1.000.000 VND</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
