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
                    <div class="comments-area w-100" style="margin-top: 0px !important;">
                        <h2 class="mb-2">Multi-function Account</h2>
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
                                <th scope="row">123002020202</th>
                                <td>Nguyen Van A</td>
                                <td>5 .000 .000 VND</td>
                                <td><a href="{{ Route('DetailAccountInfo',1) }}" class="text-warning"> View Detail</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 posts-list">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Account information</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Payment deposit account</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Multi-function Account</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Savings deposit account</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Credit card account</p>
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
