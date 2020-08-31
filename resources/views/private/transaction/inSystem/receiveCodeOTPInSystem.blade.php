@extends('layout.layoutPrivate')
@section('title','AccountInfor')
@section('content')


    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>Transfers</h2>
                    <div class="page_link">
                        <a> In Transfers</a>
                        <a>Confirm OTP</a>
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
                <h2 class="text-black text-uppercase " style="letter-spacing: 1px"> In OnLineBanking</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="jumbotron">
                        <form action="{{Route('alertsSuccessTransactionInSystem')}}" method="post">
                            <div class="card">
                                <h5 class="card-header">Enter Coce OTP</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Please Enter Code OTP for confirm Transaction</h5>
                                    <p class="card-text"> The otp code is sent to the email: nguyenvana@gmail.com</p>
                                    <p class="card-text">Please checking</p>
                                    <div class="form-group w-25 mb-2">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="text" class="form-control" name="codeOPT" id="inputPassword2"
                                               placeholder="OTP ..." value="{{ $codeOTP }}">
                                    </div>
                                    <button type="submit" class="submit_btn banner_btn mt-3">Submit</button>
                                </div>
                                @if ( Session::has('error') )
                                    <div class="alert alert-danger alert-dismissible " role="alert">
                                        <ul>
                                            <li>
                                                {{ Session::get('error') }}
                                            </li>
                                        </ul>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
