@extends('layout.layoutPrivate')
@section('title','Transfers | In System')
@section('content')


    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>Transfers</h2>
                    <div class="page_link">
                        <a> In System</a>
                        <a>Alert Success</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="card alert alert-dark mx-auto p-5 text-center" style="width: 50rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-check-circle "
                                                      style="font-size: 60px !important; color: #a7cb00!important;"></i>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Well done!</h6>
                            <p class="card-text">Quý khách thực hiện chuyển tiền thành công <span class="text-success">{{ number_format($inforNotification['money']) }} VND</span> cho <span class="text-success">{{ $inforNotification['accountNumber'] }}</span></p>
                            <p class="card-text">từ <span class="text-success"> {{ $inforNotification['accountSource'] }}.</span></p>
                                <p class="card-text"><i class="fa fa-phone mr-2" style="font-size: 50px !important; color: red !important; margin-top: 10px"></i>Tứ vấn hổ trợ <span class="text-danger" >1122 0000</span></p>
                            <a href="{{ Route('AccountInfo') }}" class="submit_btn banner_btn">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
