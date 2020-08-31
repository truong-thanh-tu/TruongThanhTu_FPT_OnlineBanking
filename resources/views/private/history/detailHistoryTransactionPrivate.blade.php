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
                        <a href="single-blog.html"> Detail History Transaction</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"> Code Transaction : <span>{{ $getData->CodeTransaction }}</span></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Transfer person</h5>
                            <p class="card-text">Name :
                                <span> {{ $getData->typeAccountCustomer->first()->customer->LastName." ".$getData->typeAccountCustomer->first()->customer->FirstName  }}</span>
                            </p>
                            <p class="card-text">Account :
                                <span>{{ $getData->typeAccountCustomer->first()->account->AccountSourceNumber }}</span>
                            </p>
                            <h5 class="card-title">Beneficiaries</h5>
                            <p class="card-text">Name : <span> {{ $getData->NameBeneficiaries }}</span></p>
                            <p class="card-text">Account : <span>{{ $getData->Beneficiaries }}</span></p>
                            <p class="card-text">Banking : <span>{{ $getData->bank->Name }}</span></p>
                            <h5 class="card-title">Information Transaction</h5>
                            <p class="card-text">Date : <span>{{ $getData->TransactionDate }}</span></p>
                            <p class="card-text">Money transfer : <span>{{ number_format($getData->TransactionMoneyNumber) }} VND</span>
                            </p>
                            <p class="card-text">Content transaction : <span>{{ $getData->ContentTransaction }}</span>
                            </p>
                            <p class="card-text">Free : <span>{{ number_format( $getData->Fee) }} VND</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection

