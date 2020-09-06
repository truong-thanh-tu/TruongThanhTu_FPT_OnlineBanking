@extends('layout.layoutPublic')

@section('title','About - ThreeT')

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

    <!--================Success Area =================-->
    <section class="success_area">
        <div class="row m0">
            <div class="col-lg-6 p0">
                <div class="mission_text">
                    <h4>Establish</h4>
                    <p>We were established in the year 2020/08/15 in Hue city by Team TreeT</p>
                </div>
            </div>
            <div class="col-lg-6 p0">
                <div class="success_img">
                    <img src="{{ asset('img/success3.jpg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row m0 right_dir">
            <div class="col-lg-6 p0">
                <div class="success_img">
                    <img src="{{ asset('img/success4.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p0">
                <div class="mission_text">
                    <h4>Target </h4>
                    <p> Safe & Convenient</p>
                </div>
            </div>
        </div>
        <div class="row m0">
            <div class="col-lg-6 p0">
                <div class="mission_text">
                    <h4>Funtion</h4>
                    <p>A company operating in the field of e-commerce, specializing in providing payment and money transfer services via the Internet. This is an electronic payment and transfer service that replaces traditional paper-based methods such as checks and money orders.</p>
                </div>
            </div>
            <div class="col-lg-6 p0">
                <div class="success_img">
                    <img src="{{ asset('img/success1.jpg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row m0 right_dir">
            <div class="col-lg-6 p0">
                <div class="success_img">
                    <img src="{{ asset('img/success5.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p0">
                <div class="mission_text">
                    <h4>Profit</h4>
                    <p>  Collects fees by performing payment processing for online operators, auction sites, and other corporate customers.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================End Success Area =================-->
@endsection
