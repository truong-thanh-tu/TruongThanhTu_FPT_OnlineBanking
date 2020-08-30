@extends('layout.layoutPrivate')
@section('title','AccountInfor')
@section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>Information</h2>
                    <div class="page_link">
                        <a href="index.html">Account</a>
                        <a href="single-blog.html">Information Account</a>
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
                <div class="col-lg-8 posts-list">
                    @foreach ($getDataTypeAccountCustomers as $getDataTypeAccountCustomer)
                        <div class="alert-secondary p-5 w-100 mt-3" >
                            <h2 class="mb-2">{{ $getDataTypeAccountCustomer->typeAccount->TypeAccount }}</h2>
                            <table class="table bg-white">
                                <thead style="background-color:#a7cb00!important; ">
                                <tr>
                                    <th scope="col">Account Number</th>
                                    <th scope="col">Account Name</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">View Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $getDataTypeAccountCustomer->account->AccountSourceNumber }}</th>
                                    <td>{{ $getDataTypeAccountCustomer->customer->LastName . " " . $getDataTypeAccountCustomer->customer->FirstName }}</td>
                                    <td>{{ number_format($getDataTypeAccountCustomer->account->BalanceSource)  }} VND</td>
                                    <td><a href="{{ Route('DetailAccountInfo',$getDataTypeAccountCustomer->IDTypeAccountCustomer) }}" class="text-warning"> View Detail</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4 posts-list">
                    <div class="blog_right_sidebar mt-3">
                        <aside class="single_sidebar_widget post_category_widget" style="">
                            <h4 class="widget_title">Account information</h4>
                            <ul class="list cat-list">
                                @foreach ($getDataTypeAccountCustomers as $getDataTypeAccountCustomer)
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>{{$getDataTypeAccountCustomer->typeAccount->TypeAccount }}</p>
                                        </a>
                                    </li>
                                @endforeach
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
