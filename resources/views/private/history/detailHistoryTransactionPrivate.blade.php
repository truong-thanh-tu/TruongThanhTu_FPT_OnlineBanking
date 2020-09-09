@extends('layout.layoutPrivate')
@section('title','History | Detail History')
@section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>History</h2>
                    <div class="page_link">
                        <a>History</a>
                        <a> Detail History Transaction</a>
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
                    <div class="card ">
                        <div class="card-header" style="background-color:#a7cb00!important; ">
                            <h5 class="card-title"> Code Transaction : <span>{{ $getData->CodeTransaction }}</span></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Transfer person</h5>
                            <p class="card-text font-weight-bold">Name :
                                <span class="font-weight-normal"> {{ $getData->typeAccountCustomer->first()->customer->LastName." ".$getData->typeAccountCustomer->first()->customer->FirstName  }}</span>
                            </p>
                            <p class="card-text font-weight-bold">Account :
                                <span>{{ $getData->typeAccountCustomer->first()->account->AccountSourceNumber }}</span>
                            </p>
                            <h5 class="card-title">Beneficiaries</h5>
                            <p class="card-text font-weight-bold">Name :<span class="font-weight-normal"> {{ $getData->NameBeneficiaries }}</span></p>
                            <p class="card-text font-weight-bold">Account :<span class="font-weight-normal">{{ $getData->Beneficiaries }}</span></p>
                            <p class="card-text font-weight-bold">Banking : <span class="font-weight-normal">{{ $getData->bank->Name }}</span></p>
                            <h5 class="card-title">Information Transaction</h5>
                            <p class="card-text font-weight-bold">Date : <span class="font-weight-normal">{{ $getData->TransactionDate }}</span></p>
                            <p class="card-text font-weight-bold">Money transfer :<span class="font-weight-normal">{{ number_format($getData->TransactionMoneyNumber) }} VND</span>
                            </p>
                            <p class="card-text font-weight-bold">Content transaction : <span class="font-weight-normal">{{ $getData->ContentTransaction }}</span>
                            </p>
                            <p class="card-text font-weight-bold">Free : <span class="font-weight-normal">{{ number_format( $getData->Fee) }} VND</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection

