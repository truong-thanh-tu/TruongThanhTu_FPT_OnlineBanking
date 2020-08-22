@extends('Layout.master')
@section('title')
    CÀI ĐẶT DACH SÁCH NGƯỜI HƯỞNG
@endsection
@section('Content')
    <div class="col-lg-8">
        <div class="content p-3">
            <div class="alert alert-primary text-center" role="alert">
                CÀI ĐẶT DACH SÁCH NGƯỜI HƯỞNG
            </div>
            <div class="bg-white p-3">
                <div class="search">
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nhận tên / Số tài khoản"
                                   aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="searchName input-group-append ml-2">
                                <button class="btn" type="submit">Tìm kiếm</button>
                            </div>
                            <div class="input-group-append ml-2">
                                <button class="btn" data-toggle="modal" href="#"
                                        data-target="#centralModalSuccess" role="button">Tạo mới
                                </button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
                <div class="informationBeneficiariess">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Tên người hưởng</th>
                            <th scope="col">Số tài khoản</th>
                            <th scope="col">Ngân hàng</th>
                            <th scope="col"><i class="fas fa-pencil-alt"></i></th>
                            <th scope="col"><i class="fas fa-times-circle"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Nguyển Văn A</td>
                            <td>125469823256</td>
                            <td>Khác OnlineBanking</td>
                            <th scope="col"><a href=""><i class="fas fa-pencil-alt"></i></a></th>
                            <th scope="col"><a href=""><i class="fas fa-times-circle"></i></a></th>
                        </tr>
                        <tr>
                            <td>Nguyển Văn A</td>
                            <td>125469823256</td>
                            <td>Khác OnlineBanking</td>
                            <th scope="col"><a href=""><i class="fas fa-pencil-alt"></i></a></th>
                            <th scope="col"><a href=""><i class="fas fa-times-circle"></i></a></th>
                        </tr>
                        <tr>
                            <td>Nguyển Văn A</td>
                            <td>125469823256</td>
                            <td>Khác OnlineBanking</td>
                            <th scope="col"><a href=""><i class="fas fa-pencil-alt"></i></a></th>
                            <th scope="col"><a href=""><i class="fas fa-times-circle"></i></a></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class=" addBeneficiaries modal fade" id="centralModalSuccess" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        Thêm mới người hưởng
                    </div>
                    <div class="card-body">
                        <form action="">
                            <table class="table">
                                <tr>
                                    <th>Ngân hàng</th>
                                    <td>
                                        <select class="browser-default custom-select">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Số tài khoản người hưởng</th>
                                    <td><input type="password" class="form-control"
                                               aria-label="Username" aria-describedby="addon-wrapping"></td>
                                </tr>
                                <tr>
                                    <th>Tên người hưởng</th>
                                    <td><input type="password" class="form-control"
                                               aria-label="Username" aria-describedby="addon-wrapping"></td>
                                </tr>
                            </table>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-primary">Cập nhật</button>
                                <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Đống lại</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
@endsection
