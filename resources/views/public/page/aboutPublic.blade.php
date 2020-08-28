@extends('public.layout.layout')

@section('title','About')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>About Us</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="about-us.html">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Mission Area =================-->
    <section class="mission_area">
        <div class="row m0">
            <div class="col-lg-6 p0">
                <div class="left_img"><img src="{{ asset('img/mission-1.jpg') }}" alt=""></div>
            </div>
            <div class="col-lg-6 p0">
                <div class="mission_slider owl-carousel">
                    <div class="item">
                        <div class="mission_text">
                            <h4>Road to Success</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                        </div>
                        <div class="mission_text">
                            <h4>About Our Mission</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="mission_text">
                            <h4>Road to Success</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                        </div>
                        <div class="mission_text">
                            <h4>About Our Mission</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="mission_text">
                            <h4>About Our Mission</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                        </div>
                        <div class="mission_text">
                            <h4>Road to Success</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Mission Area =================-->

    <!--================Success Area =================-->
    <section class="success_area">
        <div class="row m0">
            <div class="col-lg-6 p0">
                <div class="mission_text">
                    <h4>Road to Success</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                </div>
            </div>
            <div class="col-lg-6 p0">
                <div class="success_img">
                    <img src="{{ asset('img/success-1.jpg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row m0 right_dir">
            <div class="col-lg-6 p0">
                <div class="success_img">
                    <img src="{{ asset('img/success-2.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p0">
                <div class="mission_text">
                    <h4>Road to Success</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================End Success Area =================-->
@endsection
