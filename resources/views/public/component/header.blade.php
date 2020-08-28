{{--Show the header in the Public section--}}
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item {{ (request()->segment(2) == '') ? 'active' : '' }}"><a class="nav-link" href="{{ Route('Home') }}">Home</a></li>
                        <li class="nav-item {{ (request()->segment(2) == 'about') ? 'active' : '' }}"><a class="nav-link" href="{{ Route('About') }}">About</a></li>
                        <li class="nav-item {{ (request()->segment(2) == 'blog') ? 'active' : '' }}"><a class="nav-link" href="{{ Route('Blog') }}">Blog</a></li>
                        <li class="nav-item {{ (request()->segment(2) == 'contact') ? 'active' : '' }}"><a class="nav-link" href="{{ Route('Contact') }}">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="nav-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="nav-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li class="nav-item"><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
