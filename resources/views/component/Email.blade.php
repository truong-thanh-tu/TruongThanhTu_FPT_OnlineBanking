
<div class="card">
    <h5 class="card-header"><img src="{{ asset('img/icon-web.png')  }}" alt="">OnlineBanking</h5>
    <div class="card-body">
        <h1>Xin chào bạn:{{ $Name }}</h1>
        <p>Chúng tôi đã nhận được yêu cầu xác nhận giao dịch của bạn</p>
        <p>Đây là mã OTP của bạn</p>
        <h2 style="padding: 20px 30px !important;" class="bg-light">
            {{ $CodeOTP }}
        </h2>


    </div>
</div>
