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

                        <h2 class="text-center"
                            style="font-size: 45px !important;margin-bottom: 20px !important; color: black !important;">
                            Login</h2>
                        <form action="{{ Route('Login') }}" method="post">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="username"
                                           value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['user'] ?>"
                                           placeholder="Username...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="email" name="password"
                                           value="<?php if (isset($_COOKIE['pass'])) echo $_COOKIE['pass'] ?>"
                                           placeholder="Password...">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" name="remember"
                                           id="defaultCheck1" <?php if (isset($_COOKIE['user'])) echo "checked" ?>>
                                    <label class="form-check-label" for="defaultCheck1">
                                        Remember
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="banner_btn submit_btn">Login</button>
                            </div>
                            @csrf
                        </form>
                        <div class="mt-3"></div>
                        @if ( Session::has('error') )
                            <div class="alert alert-danger alert-dismissible " role="alert">
                                <ul>
                                    <li>
                                        {{ Session::get('error') }}
                                    </li>
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Mission Area =================-->

@endsection
