@extends('layout.layoutPublic')

@section('title','Login - ThreeT')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>Login</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="contact.html">Login</a>
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
                <div class="container">
                    <div class="login alert-primary p_120 rounded w-50 mx-auto">

                        <h2 class="text-center"style="font-size: 45px !important;margin-bottom: 20px !important; color: black !important;">Login</h2>
                        <form action="{{ Route('AccountInfo') }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Username...">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Password...">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Remember
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Mission Area =================-->

@endsection
