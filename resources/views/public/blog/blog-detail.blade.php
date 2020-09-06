@extends('layout.layoutPublic')

@section('title','Blog - ThreeT ')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>Blog Details</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="single-blog.html">Blog Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ asset($getDataBlog->Img) }}" alt="">
                            </div>
                        </div>
                        {!!   $getDataBlog->Content2 !!}
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
