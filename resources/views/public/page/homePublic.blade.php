@extends('public.layout.layout')

@section('title','Home')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('img/slider/slider-1.jpg') }} " alt="">
                    <div class="slider_text_inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="slider_text text-center">
                                        <h2>Login </h2>
                                        <form class="row contact_form" action="contact_process.php" method="post"
                                              id="contactForm" novalidate="novalidate">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           placeholder="Enter your name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="subject" name="subject"
                                                           placeholder="Enter Subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="submit" value="submit" class="btn submit_btn">Login
                                                </button>
                                            </div>
                                        </form>
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
            <div class="col-lg-4 col-md-6 p0">
                <div class="project_item">
                    <img src="img/project/project-1.jpg" alt="">
                    <div class="hover_text">
                        <h4>Exotic <br/>Mangrove</h4>
                        <div class="cat">
                            <a href="#">Lifestyle</a>
                            <a href="#">People</a>
                        </div>
                        <a class="main_btn" href="#">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p0">
                <div class="project_item">
                    <img src="img/project/project-2.jpg" alt="">
                    <div class="hover_text">
                        <h4>Exotic <br/>Mangrove</h4>
                        <div class="cat">
                            <a href="#">Lifestyle</a>
                            <a href="#">People</a>
                        </div>
                        <a class="main_btn" href="#">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p0">
                <div class="project_item">
                    <img src="img/project/project-3.jpg" alt="">
                    <div class="hover_text">
                        <h4>Exotic <br/>Mangrove</h4>
                        <div class="cat">
                            <a href="#">Lifestyle</a>
                            <a href="#">People</a>
                        </div>
                        <a class="main_btn" href="#">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p0">
                <div class="project_item">
                    <img src="img/project/project-4.jpg" alt="">
                    <div class="hover_text">
                        <h4>Exotic <br/>Mangrove</h4>
                        <div class="cat">
                            <a href="#">Lifestyle</a>
                            <a href="#">People</a>
                        </div>
                        <a class="main_btn" href="#">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p0">
                <div class="project_item">
                    <img src="img/project/project-5.jpg" alt="">
                    <div class="hover_text">
                        <h4>Exotic <br/>Mangrove</h4>
                        <div class="cat">
                            <a href="#">Lifestyle</a>
                            <a href="#">People</a>
                        </div>
                        <a class="main_btn" href="#">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p0">
                <div class="project_item">
                    <img src="img/project/project-6.jpg" alt="">
                    <div class="hover_text">
                        <h4>Exotic <br/>Mangrove</h4>
                        <div class="cat">
                            <a href="#">Lifestyle</a>
                            <a href="#">People</a>
                        </div>
                        <a class="main_btn" href="#">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Project Area =================-->

@endsection
