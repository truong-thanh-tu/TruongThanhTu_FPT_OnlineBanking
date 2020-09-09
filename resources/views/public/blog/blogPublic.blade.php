@extends('layout.layoutPublic')

@section('title','Blog - ThreeT ')

@section('content')

    <!--================Blog Area =================-->
    <section class="blog_area mt-5" style="margin-top: 117px!important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach($getDataBlogs as $getDataBlog)
                            <article class="row blog_item">
                                <div class="col-md-12">
                                    <div class="blog_post">
                                        <img  class="img-fluid" src=" {{ asset($getDataBlog->Img) }}" alt="">
                                        <div class="blog_details">
                                            <a href="{{ Route('Blog-Detail',$getDataBlog->IDBlog) }}"><h2>{{$getDataBlog->TitleBlog}}</h2></a>
                                            <h5>{{date('d-m-Y', strtotime($getDataBlog->created_at))  }}</h5>

                                            <p>{{ $getDataBlog->Content1 }}</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach


                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
                                    </a>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">01</a></li>
                                <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                <li class="page-item"><a href="#" class="page-link">03</a></li>
                                <li class="page-item"><a href="#" class="page-link">04</a></li>
                                <li class="page-item"><a href="#" class="page-link">09</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popular Posts</h3>
                            @foreach($getDataBlogs as $getDataBlog)
                                <div class="media post_item">
                                    <img  style="width: 100px;height: 100px" src="{{ asset($getDataBlog->Img) }}" alt="post">
                                    <div class="media-body">
                                        <a href="{{ Route('Blog-Detail',$getDataBlog->IDBlog) }}"><h3>{{ $getDataBlog->TitleBlog }}</h3></a>
                                        <p>{{date('d-m-Y', strtotime($getDataBlog->created_at))  }}</p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
