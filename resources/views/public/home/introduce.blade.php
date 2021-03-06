@extends('layout.layoutPublic')

@section('title','Post')
@section('content')




    <!--================Portfolio Details Area =================-->
    <section class="portfolio_details_area p_120">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left_img">
                            <img class="img-fluid" src="{{ asset($valueIntroduce->Img) }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portfolio_right_text">
                            <h4>{{ $valueIntroduce->TitleIntroduce }}</h4>
                            <p>{{ $valueIntroduce->Content1 }}</p>

                            <ul class="list social_details">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p>{{ $valueIntroduce->Content1 }}</p>
                <p>{{ $valueIntroduce->Content2 }}</p>
            </div>
        </div>
    </section>
    <!--================End Portfolio Details Area =================-->

@endsection

