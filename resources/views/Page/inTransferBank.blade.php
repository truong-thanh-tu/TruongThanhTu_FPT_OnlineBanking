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
               <form action="{{ Route('ConfirmInTransferBank') }}">
                   <div class="section1">
                       <div class="title">
                           <h5>THÔNG TIN NGƯỜI CHUYỂN</h5>
                       </div>
                       <div class="content bg-white">
                           <table class="table">
                               <tr>
                                   <th class="w-50">Tài khoản</th>
                                   <td class="w-50"><input type="text" class="form-control" name="accountSource" value="12346565656565"
                                                           aria-label="Username" aria-describedby="addon-wrapping"></td>
                               </tr>
                               <tr>
                                   <th class="w-50">Số dư khả dụng</th>
                                   <td class="w-50"><input type="text" class="form-control" name="balance" aria-label="Username"
                                                           aria-describedby="addon-wrapping"></td>
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
                                   <th>Tím kiếm</th>
                                   <td><input type="text" class="form-control"
                                              placeholder="Nhập tên hoặc số tài khoản đã lưu"
                                              aria-label="Username" aria-describedby="addon-wrapping"></td>
                               </tr>
                               <tr>
                                   <th>Số tài khoản</th>
                                   <td><input type="text" class="form-control"
                                              aria-label="Username"name="accountHeard" aria-describedby="addon-wrapping"></td>
                               </tr>
                               <tr>
                                   <th>Tên người thụ hưởng</th>
                                   <td><input type="text" class="form-control"
                                              aria-label="Username" name="nameHeard" aria-describedby="addon-wrapping"></td>
                               </tr>
                               <tr>
                                   <th>Lưu thông tin ngưởi hưởng</th>
                                   <td><input type="checkbox"></td>
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
                                   <th class="w-50">Số tiền chuyển</th>
                                   <td class="w-50"><input type="text" name="moneyTransfer" class="form-control"
                                                           aria-label="Username" aria-describedby="addon-wrapping"></td>
                               </tr>
                               <tr>
                                   <th class="w-50">Nội dung chuyển</th>
                                   <td class="w-50"><textarea name="content"></textarea></td>
                               </tr>
                               <tr>
                                   <th class="w-50">Người trả phi</th>
                                   <td class="w-50">
                                       <select class="custom-select custom-select-lg mb-3">
                                           <option  name ="personFree"selected>Open this select menu</option>
                                           <option value="1">One</option>
                                           <option value="2">One</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <th class="w-50">Phi chuyển</th>
                                   <td class="w-50"><input type="text" class="form-control" name="free" ></td>
                               </tr>
                           </table>
                       </div>
                   </div>
                   <div class="section4 mt-3 text-right">
                       <button type="submit" class="btn">Xác Nhận</button>
                   </div>
                   @csrf
               </form>
           </div>
        </div>
    </div>
@endsection
