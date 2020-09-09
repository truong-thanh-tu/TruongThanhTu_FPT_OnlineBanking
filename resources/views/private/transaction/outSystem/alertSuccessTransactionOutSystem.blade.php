@extends('layout.layoutPrivate')
@section('title','Transfers  | Out System')
@section('content')


    <!--================Blog Area =================-->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="card alert alert-dark mx-auto p-5 text-center" style="width: 50rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-check-circle "
                                                      style="font-size: 50px !important; color: #a7cb00!important;"></i>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Well done!</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="{{ Route('AccountInfo') }}" class="submit_btn banner_btn">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
