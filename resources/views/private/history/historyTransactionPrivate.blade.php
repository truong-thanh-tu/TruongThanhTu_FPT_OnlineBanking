@extends('layout.layoutPrivate')
@section('title','History')
@section('content')


    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>History</h2>
                    <div class="page_link">
                        <a>History</a>
                        <a>History Transaction</a>
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
                        <div class="col-lg-12">
                            <form class="form-inline" action="{{ Route('History') }}">
                                <div class="row">
                                    <span>To</span>
                                    <div class="col">
                                      <input type="date" name="dateToInSystem" class="form-control w-"required="required" placeholder="To">
                                    </div>
                                    <span>From</span>
                                    <div class="col">
                                        <input type="date"name="dateFromInSystem" class="form-control w-100" required="required"placeholder="Form">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="submit_btn  border-0">Search</button>
                                    </div>
                                </div>
                            </form>
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
                                    <td scope="col">{{ $getHistoryInSystem->Beneficiaries }}</td>
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
                                    <span>To</span>

                                    <div class="col">
                                        <input type="date" name="c"class="form-control w-100" placeholder="To" required="required">
                                    </div>
                                    <span>From</span>

                                    <div class="col">
                                        <input type="date" name="dateFromOutSystem"class="form-control w-100" placeholder="Form" required="required">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="submit_btn  border-0">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3">
                        </div>
                    </aside>
                    <aside class=" row blog_right_sidebar single_sidebar_widget search_widget">
                        <table class="table bg-white text-center">
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
                                    <td scope="col">{{ $getHistoryOutSystem->Beneficiaries }}</td>
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
