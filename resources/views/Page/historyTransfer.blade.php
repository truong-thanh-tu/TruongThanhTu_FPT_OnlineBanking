@extends('Layout.master')
@section('title')
    LỊCH SỬ GIAO DỊCH
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                LỊCH SỬ GIAO DỊCH
            </div>
            <div class="historyTransfer bg-white p-3">
                <div class="searchDate">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">

                            <span class="mr-2">Từ ngày </span> <input type="date" class="form-control"
                                                                      id="inputPassword2">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <span class="mr-2">Từ ngày </span> <input type="date" class="form-control"
                                                                      id="inputPassword2">
                        </div>
                        <button type="submit" class="btn mb-2">Tìm kiếm</button>
                    </form>
                </div>
                <div class="history">
                    <table class="table table-light mt-3">
                        <thead>
                        <tr>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Tài khoản</th>
                            <th scope="col">Ngân hàng</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Xem chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        <tr>
                            <td scope="col">2020-12-08</td>
                            <td scope="col">123456789</td>
                            <td scope="col">OnlineBanking</td>
                            <td scope="col">+ 12.200.300 VND</td>
                            <td scope="col"><a href="{{ Route('DetailHistoryTransfer',1) }}">Xem chi tiết</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"> <i class="fas fa-caret-left"></i> </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"> <i class="fas fa-caret-right"></i> </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
