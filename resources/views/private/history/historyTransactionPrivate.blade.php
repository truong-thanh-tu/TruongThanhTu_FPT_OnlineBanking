@extends('layout.layoutPrivate')
@section('title','AccountInfor')
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
                <h2> In OnLineBanking</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <aside class=" row blog_right_sidebar single_sidebar_widget search_widget">
                        <div class="col-lg-9">
                            <form class="form-inline">
                                <div class="row">
                                    <div class="col">
                                        <input type="date" class="form-control w-100" placeholder="To">
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control w-100" placeholder="Form">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="submit_btn btn-light border-0">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="dropdown">
                                <a class="btn submit_btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown link
                                </a>

                                <div class="dropdown-menu w-75" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Month</a>
                                    <a class="dropdown-item" href="#">Year</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside class=" row blog_right_sidebar single_sidebar_widget search_widget">
                        <table class="table bg-white">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Date</th>
                                <th scope="col">Account</th>
                                <th scope="col">Money</th>
                                <th scope="col">View</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="col">1</th>
                                <td scope="col">Mark</td>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                <th scope="col"><a href="{{ Route('DetailHistory',1) }}">View Detail</a></th>
                            </tr>

                            </tbody>
                        </table>
                        <div class="paginate">
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
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area">
        <div class="container">
            <div class="row">
                <h2> Out OnLineBanking</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <aside class=" row blog_right_sidebar single_sidebar_widget search_widget">
                        <div class="col-lg-9">
                            <form class="form-inline">
                                <div class="row">
                                    <div class="col">
                                        <input type="date" class="form-control w-100" placeholder="To">
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control w-100" placeholder="Form">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="submit_btn btn-light border-0">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="dropdown">
                                <a class="btn submit_btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown link
                                </a>

                                <div class="dropdown-menu w-75" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Month</a>
                                    <a class="dropdown-item" href="#">Year</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside class=" row blog_right_sidebar single_sidebar_widget search_widget">
                        <table class="table bg-white">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Date</th>
                                <th scope="col">Account</th>
                                <th scope="col">Money</th>
                                <th scope="col">View</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="col">1</th>
                                <td scope="col">Mark</td>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                <th scope="col"><a href="{{ Route('DetailHistory',1) }}">View Detail</a></th>
                            </tr>

                            </tbody>
                        </table>
                        <div class="paginate">
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
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
