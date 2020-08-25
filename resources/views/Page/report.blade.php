@extends('Layout.master')
@section('title')
    BÁO CÁO
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                BÁO CÁO GIAO DỊCH
            </div>
            <div class="reportTransfer p-3">
                <div class="selectOption text-right ">
                    <div class="btn-group">
                        <button class=" btn-lg dropdown-toggle" type="button"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            thời gian
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Tháng</a>
                            <a class="dropdown-item" href="#">Năm</a>
                        </div>
                    </div>
                </div>
                <div class="reportNumber">
                    <div class="container">
                        <div class="row">
                            <div class="title">
                                <h5>Tài khoản thanh toán</h5>
                            </div>
                        </div>
                        <div class="row bg-white p-3">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fas fa-exchange-alt"></i></h4>
                                        <h5 class="card-subtitle mb-2 text-muted">30 </h5>
                                        <p>Số lần giao dịch</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="far fa-money-bill-alt"></i></i></h4>
                                        <h5 class="card-subtitle mb-2 text-muted">30.300.300</h5>
                                        <p>Số tiền giao dịch</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fas fa-user-friends"></i></h4>
                                        <h5 class="card-subtitle mb-2 text-muted">2 </h5>
                                        <p>Số người </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="reportNumber">
                    <div class="container">
                        <div class="row">
                            <div class="title">
                                <h5>Tài khoản tiết kiệm</h5>
                            </div>
                        </div>
                        <div class="row bg-white p-3">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fas fa-exchange-alt"></i></h4>
                                        <h5 class="card-subtitle mb-2 text-muted">30 </h5>
                                        <p>Số lần giao dịch</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="far fa-money-bill-alt"></i></i></h4>
                                        <h5 class="card-subtitle mb-2 text-muted">30.300.300</h5>
                                        <p>Số tiền giao dịch</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fas fa-user-friends"></i></h4>
                                        <h5 class="card-subtitle mb-2 text-muted">2 </h5>
                                        <p>Số người </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="reporTable">
                    <div class="container">
                        <div class="row">
                            <div class="title">
                                <h5>Tổng quát</h5>
                            </div>
                        </div>
                        <div class="reporTableGenerality bg-light p-3">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên người</th>
                                    <th scope="col">SỐ lần giao dịch</th>
                                    <th scope="col">SỐ tiền giao dịch</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Nguyen Van A</td>
                                    <td>14</td>
                                    <td>13.300.000 VDN</td>
                                </tr>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Nguyen Van A</td>
                                    <td>14</td>
                                    <td>13.300.000 VDN</td>
                                </tr>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Nguyen Van A</td>
                                    <td>14</td>
                                    <td>13.300.000 VDN</td>
                                </tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="fas fa-caret-left"></i></a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="fas fa-caret-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
