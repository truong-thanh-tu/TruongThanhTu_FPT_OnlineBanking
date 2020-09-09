@extends('layout.layoutPrivate')
@section('title','Report')
@section('content')


    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>Report</h2>
                    <div class="page_link">
                        <a>Report</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="row text-center p-120">
                <div class="col-lg-6">
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ number_format($totalCome) }} VND</h5>
                                <p class="card-text"> Amount of money transferred</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ number_format($totalDepart) }} VND</h5>
                                <p class="card-text"> Amount received </p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area ">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <form action="">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                   value="option1">
                            <label class="form-check-label text-uppercase" style="font-weight: bold" for="inlineRadio1">1
                                month</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                   value="option2">
                            <label class="form-check-label text-uppercase" style="font-weight: bold" for="inlineRadio1">
                                1
                                year</label>
                        </div>
                        <button type="submit"
                                style="padding: 0px 20px !important;cursor: pointer;line-height: 38px !important;background: #a7cb00!important; color: white!important;    display: inline-block!important;border-radius: 5px;font-size: 14px !important;font-family: 'Raleway', sans-serif !important;font-weight: 600;border: none">
                            Search
                        </button>
                    </form>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <table class="table">
                        <thead style="background-color:#a7cb00!important; ">
                        <tr>
                            <th scope="col">Day</th>
                            <th scope="col">Interpretation / Number of entries</th>
                            <th scope="col">Come/Depart
                            </th>
                            <th scope="col">Balance</th>
                            <th scope="col">View</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($getDataHistoryTransactions as $getHT)
                            <tr>
                                <th scope="row">{{ $getHT->TransactionDate }}</th>
                                <td>
                                    <p>{{ $getHT->NameBeneficiaries }}</p>
                                    <p>{{ $getHT->Beneficiaries }}</p>
                                </td>
                                <td>{{($getHT->Species == 1)?'Come':'Depart'  }}</td>
                                <td>
                                    @if($getHT->Species == 1)
                                        <p class="text-danger">
                                            + {{ number_format($getHT->TransactionMoneyNumber)  }} VND</p>
                                    @else
                                        <p style="color: black">
                                            - {{  number_format($getHT->TransactionMoneyNumber) }} VND</p>
                                    @endif
                                </td>
                                <td><a href="{{ Route('PDFReport',$getHT->IDTransaction) }}"><i class="fa fa-copy"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="paginate">
                        {{ $getDataHistoryTransactions->links() }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">People performing the transaction</h4>
                            <ul class="list cat-list">
                                @foreach($objNames  as $key=> $objName)
                                    <li>
                                        <a  class="d-flex justify-content-between">
                                            <p>{{ $key  }}</p>
                                            <p>{{ $objName }}</p>
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
