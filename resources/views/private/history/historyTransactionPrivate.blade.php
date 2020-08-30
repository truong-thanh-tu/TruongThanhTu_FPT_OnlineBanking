@extends('layout.layoutPrivate')
@section('title','AccountInfor')
@section('content')


    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>History</h2>
                    <div class="page_link">
                        <a href="index.html">History</a>
                        <a href="single-blog.html">History Transaction</a>
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
                <h2> In OnLineBanking</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <aside class=" row blog_right_sidebar single_sidebar_widget search_widget">
                        <div class="col-lg-9">
                            <form class="form-inline">
                                <div class="row">
                                    <div class="col">
                                        <input type="date" class="form-control w-100" placeholder="To">
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control w-100" placeholder="Form">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="submit_btn btn-light border-0">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="dropdown">
                                <a class="btn submit_btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown link
                                </a>

                                <div class="dropdown-menu w-75" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Month</a>
                                    <a class="dropdown-item" href="#">Year</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside class=" row blog_right_sidebar single_sidebar_widget search_widget">
                        <table class="table bg-white table-hover">
                            <thead class=" text-center" style="background-color:#a7cb00!important; ">
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Date</th>
                                <th scope="col">Account</th>
                                <th scope="col">Money</th>
                                <th scope="col">View</th>

                            </tr>
                            </thead>
                            <tbody class="text-center" style="letter-spacing: 1px !important;">
                            @foreach($getHistoryInSystems as $getHistoryInSystem)
                                <tr>
                                    <td scope="col">{{ $getHistoryInSystem->CodeTransaction }}</td>
                                    <td scope="col">{{ $getHistoryInSystem->TransactionDate }}</td>
                                    <td scope="col">{{ $getHistoryInSystem->beneficiaries->AccountBeneficiaries }}</td>
                                    <td scope="col">{{ number_format($getHistoryInSystem->TransactionMoneyNumber) }}
                                        VND
                                    </td>
                                    <td scope="col"><a
                                            href="{{ Route('DetailHistory',$getHistoryInSystem->IDTransaction) }}">View</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $getHistoryInSystems->links() }}
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area mb-30">
        <div class="container">
            <div class="row">
                <h2> Out OnLineBanking</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <aside class=" row blog_right_sidebar single_sidebar_widget search_widget">
                        <div class="col-lg-9">
                            <form class="form-inline">
                                <div class="row">
                                    <div class="col">
                                        <input type="date" class="form-control w-100" placeholder="To">
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control w-100" placeholder="Form">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="submit_btn btn-light border-0">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="dropdown">
                                <a class="btn submit_btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown link
                                </a>

                                <div class="dropdown-menu w-75" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Month</a>
                                    <a class="dropdown-item" href="#">Year</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside class=" row blog_right_sidebar single_sidebar_widget search_widget">
                        <table class="table bg-white">
                            <thead style="background-color:#a7cb00!important; ">
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Date</th>
                                <th scope="col">Account</th>
                                <th scope="col">Money</th>
                                <th scope="col">View</th>

                            </tr>
                            </thead>
                            <tbody class="text-center" style="letter-spacing: 1px !important;">
                            @foreach($getHistoryOutSystems as $getHistoryOutSystem)
                                <tr>
                                    <td scope="col">{{ $getHistoryOutSystem->CodeTransaction }}</td>
                                    <td scope="col">{{ $getHistoryOutSystem->TransactionDate }}</td>
                                    <td scope="col">{{ $getHistoryOutSystem->beneficiaries->AccountBeneficiaries }}</td>
                                    <td scope="col">{{ number_format($getHistoryOutSystem->TransactionMoneyNumber) }}
                                        VND
                                    </td>
                                    <td scope="col"><a
                                            href="{{ Route('DetailHistory',$getHistoryOutSystem->IDTransaction) }}">View</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $getHistoryInSystems->links() }}
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
