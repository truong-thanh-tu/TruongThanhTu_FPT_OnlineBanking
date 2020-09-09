@extends('layout.layoutPrivate')
@section('title','Transfers | In System')
@section('content')



    <!--================Blog Area =================-->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="card alert alert-dark mx-auto p-5 text-center" style="width: 50rem;">
                        <div class="card-body">
                            <h2>Successful transaction</h2>
                            <p>You have successfully submitted</p>
                            <h3>{{ $inforNotification['money'] }} VND</h3>
                            <p>From Account</p>
                            <h3>{{ $inforNotification['nameAccount'] }} </h3>
                            <h4>{{ $inforNotification['accountSource'] }} </h4>
                            <p>To Account</p>
                            <h3>{{ $inforNotification['nameBeneficiary'] }} </h3>
                            <h4>{{ $inforNotification['accountNumber'] }} </h4>
                            <p>Day trading</p>
                            <h5>{{ $inforNotification['dateTransaction'] }}</h5>
                            <p>Content Transaction</p>
                            <h5>{{ $inforNotification['contentTransaction'] }}</h5>
                            <p>Trading code</p>
                            <h5>{{ $inforNotification['codeTransaction'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--================Blog Area =================-->

@endsection
