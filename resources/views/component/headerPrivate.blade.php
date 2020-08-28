{{--Show the header in the  section--}}
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item {{ (request()->segment(2) == 'infoAccount') ? 'active' : '' }}"><a class="nav-link" href="{{Route('AccountInfo')}}">Account</a></li>
                        <li class="nav-item {{ (request()->segment(2) == 'history') ? 'active' : '' }}"><a class="nav-link" href="{{ Route('History') }}">History</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Transfers</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="blog.html">transfer  in the system</a></li>
                                <li class="nav-item"><a class="nav-link" href="single-blog.html">transfer out the system</a></li>
                            </ul>
                        </li>
                        <li class="nav-item {{ (request()->segment(2) == 'report') ? 'active' : '' }}"><a class="nav-link" href="{{ Route('Report') }}">Report</a></li>
                        <li class="nav-item submenu dropdown {{ (request()->segment(2) == 'support') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false" href="{{ Route('Support') }}">Support</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ Route('Support') }}">User manual</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ Route('Support') }}">User manual</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ Route('Support') }}">Explore OnlineBanking</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{ Route('Home') }}" class=" submit_btn banner_btn">LogOut</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
