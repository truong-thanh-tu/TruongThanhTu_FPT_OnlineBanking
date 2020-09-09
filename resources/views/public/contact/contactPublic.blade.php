@extends('layout.layoutPublic')

@section('title','Contact - ThreeT')

@section('content')


    <!--================Contact Area =================-->
    <section class="contact_area p_120  ">
        <div class="container alert-primary p-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Viet Nam, Ha Noi</h6>
                            <p>8A Ton That Thuyet</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">024 7300 8855</a></h6>
                            <p>Mon to Fri 8 am to 9 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">onlinebankingtreet@gmail.com</a></h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form mb-5" action="{{ Route('ContactMessage') }}" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                        </div>
                        @csrf
                    </form>
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
    </section>
    <!--================Contact Area =================-->

@endsection
