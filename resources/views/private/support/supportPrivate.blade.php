@extends('layout.layoutPrivate')
@section('title','Support')
@section('content')


    <!--================Portfolio Details Area =================-->
    <section class="portfolio_details_area p_120">
        <div class="container">
            {!! $getData->Content2 !!}
            <img src="{{ asset($getData->Img) }}" alt="">
        </div>
    </section>
    <!--================End Portfolio Details Area =================-->

@endsection
