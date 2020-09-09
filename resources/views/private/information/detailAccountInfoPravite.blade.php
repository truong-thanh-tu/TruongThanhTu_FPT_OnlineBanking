@extends('layout.layoutPrivate')
@section('title','Account | Detail Account')
@section('content')



    <!--================Blog Area =================-->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="comments-area w-100" style="margin-top: 0px !important;">
                        <div class="portfolio_right_text">
                            <h4>Account information {{ $getDataTypeAccountCustomer->account->AccountSourceNumber }}</h4>
                            <h5>Date: <span>{{ $dt->toDateString() }}</span></h5>
                            <ul class="list mt-3">
                                <li><span class="font-weight-bold">Full Name </span>: {{ $getDataTypeAccountCustomer->customer->LastName . " " . $getDataTypeAccountCustomer->customer->FirstName }}</li>
                                <li><span class="font-weight-bold">Type Account</span>: {{ $getDataTypeAccountCustomer->typeAccount->TypeAccount }}</li>
                                <li><span class="font-weight-bold">Balance</span>:  {{ number_format($getDataTypeAccountCustomer->account->BalanceSource)  }} VND</li>
                                <li><span class="font-weight-bold">Data Open</span>:  {{ $getDataTypeAccountCustomer->account->DateOpen }}</li>
                                <li><span class="font-weight-bold">Branch</span>:  {{ $getDataTypeAccountCustomer->account->bank->Name }}</li>
                                <li><span class="font-weight-bold">Address</span>:  {{ $getDataTypeAccountCustomer->account->bank->Address }}</li>
                                <li><span class="font-weight-bold">City</span>:  {{ $getDataTypeAccountCustomer->account->bank->City }}</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 posts-list">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <a href="{{Route('AccountInfo')}}"> <h4  class="widget_title">Account information</h4></a>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{ $getDataTypeAccountCustomer->typeAccount->TypeAccount }}</p>
                                    </a>
                                </li>

                            </ul>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection

