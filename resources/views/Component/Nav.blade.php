<div class="col-lg-4">
    <div class="fast_access">
        <div class="card w-100">
            <div class="card-header">
                <span><i class="fas fa-fast-forward mr-2"></i></span> <span>Truy Cập Nhanh</span>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ Route('InformationAccount') }}"><span><i
                                class="fas fa-chevron-right mr-2"></i></span>
                        <span>Danh sách tài khoản</span></a></li>
                <li class="list-group-item"><a href="{{ Route('InTransferBank') }}"><span><i
                                class="fas fa-chevron-right mr-2"></i></span> <span>Chuyển tiền trong OnlineBanking</span></a>
                </li>
                <li class="list-group-item"><a href="{{ Route('InTransferBank') }}"><span><i
                                class="fas fa-chevron-right mr-2"></i></span> <span>Chuyển tiền tới ngân hàng khác</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="my_banking mt-3">
        <div class="card w-100">
            <div class="card-header">
                <span><i class="fas fa-user-alt mr-2"></i></span> <span>OnlineBanking của tôi</span>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{Route('InformationCustomer')}}"><span><i
                                class="fas fa-chevron-right mr-2"></i></span> <span>Thông tin cá nhân</span></a>
                </li>
                <li class="list-group-item"><a href="{{Route('ListOfBeneficiaries')}}"><span><i
                                class="fas fa-chevron-right mr-2"></i></span>
                        <span>Cài đặt người thụ hưởng</span></a></li>
                <li class="list-group-item"><a href="{{Route('TransferLimit')}}"><span><i
                                class="fas fa-chevron-right mr-2"></i></span> <span>Cài đặt hạn mức chuyển tiền</span></a>
                </li>
                <li class="list-group-item"><a href="{{Route('ChangePassword')}}"><span><i
                                class="fas fa-chevron-right mr-2"></i></span> <span>Đôi mật khẩu</span></a>
                </li>
                <li class="list-group-item"><a href="{{Route('MethodHeardOTP')}}"><span><i
                                class="fas fa-chevron-right mr-2"></i></span> <span>Cài đặt phương thức nhận OTP</span></a>
                </li>
                <li class="list-group-item"><a href="{{Route('Login')}}"><span><i
                                class="fas fa-chevron-right mr-2"></i></span> <span>Thoát</span></a></li>
            </ul>
        </div>
    </div>
</div>
