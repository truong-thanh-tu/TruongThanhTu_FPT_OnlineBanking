@extends('Layout.master')
@section('title')
    LỊCH SỬ GIAO DỊCH
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                CHI TIẾT LỊCH SỬ GIAO DỊCH
            </div>
            <div class="informationAccount">
                <div class="detailInformationAccount ">
                    <table class="table table-light ">
                        <tbody>
                        <tr>
                            <th>Mã giao dịch</th>
                            <td>SH123</td>
                        </tr>
                        <tr>
                            <th>Thời gian giao dịch</th>
                            <td>2020-02-23</td>
                        </tr>
                        <tr>
                            <th>Tài khoản nguồn</th>
                            <td>123456789</td>
                        </tr>
                        <tr>
                            <th>Tài khoản đích</th>
                            <td>987654321</td>
                        </tr>
                        <tr>
                            <th>Loại giao dịch</th>
                            <td>Chuyển tiền nhanh</td>
                        </tr>
                        <tr>
                            <th>Số tiền giao dịch</th>
                            <td>12.200.300 VND</td>
                        </tr>
                        <tr>
                            <th>Phí giao dịch</th>
                            <td>10.300 VND</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="back text-right">
                        <a class="btn" href="{{ Route('History') }}" role="button">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
