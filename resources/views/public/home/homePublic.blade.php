@extends('layout.layoutPublic')

@section('title','Home - ThreeT')

@section('content')

    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="img/slider/slider-1.jpg" alt="">
                    <div class="slider_text_inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="slider_text">
                                        <h2>Business <span style="color: rgba(167, 203, 0, 0.8)">Loans.</span> <br/>Cash
                                            Management</h2>
                                        <p>Onec Consequat Sapien Ut Leo Cursus Rhoncus. Nullam Dui Mi, Vulputate Ac
                                            Metus Semper Nullam Dui Mi</p>
                                        <p>Vestibulum Ante Ipsum Primis In Faucibus Orci Luctus Et Ultrices Posuere
                                            Cubiliacurae, Curabitur Quis Luctus Lectus. Morbi At Dui Nisl.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide"><img src="img/slider/slider-3.jpg" alt="">
                    <div class="slider_text_inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="slider_text">
                                        <h2>Debit And.<span
                                                style="color: rgba(167, 203, 0, 0.8)"> Credit Cards </span><br>
                                            Cash Management</h2>
                                        <p>Onec Consequat Sapien Ut Leo Cursus Rhoncus. Nullam Dui Mi, Vulputate Ac
                                            Metus Semper Nullam Dui Mi</p>
                                        <p>Vestibulum Ante Ipsum Primis In Faucibus Orci Luctus Et Ultrices Posuere
                                            Cubiliacurae, Curabitur Quis Luctus Lectus. Morbi At Dui Nisl.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide"><img src="img/slider/slider-4.jpg" alt="">
                    <div class="slider_text_inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="slider_text">
                                        <h2>Debit And <span
                                                style="color: rgba(167, 203, 0, 0.8)">Credit Cards.</span><br>
                                            Cash Management</h2>

                                        <p>Onec Consequat Sapien Ut Leo Cursus Rhoncus. Nullam Dui Mi, Vulputate Ac
                                            Metus Semper Nullam Dui Mi</p>
                                        <p>Vestibulum Ante Ipsum Primis In Faucibus Orci Luctus Et Ultrices Posuere
                                            Cubiliacurae, Curabitur Quis Luctus Lectus. Morbi At Dui Nisl.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Project Area =================-->
    <section class="project_area">
        <div class="row m0">
            @foreach($valueIntroduces as $valueIntroduce)
                <div class="col-lg-4 col-md-6 p_5 mt-5 mb-5">
                    <div class="project_item">
                        <img src="{{ $valueIntroduce->Img }}" alt="">
                        <div class="hover_text">
                            <h4>{{ $valueIntroduce->TitleIntroduce }}</h4>
                            <a class="main_btn" href="{{ Route('Introduce',$valueIntroduce->IDIntroduce) }}">View More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--================End Project Area =================-->

@endsection
