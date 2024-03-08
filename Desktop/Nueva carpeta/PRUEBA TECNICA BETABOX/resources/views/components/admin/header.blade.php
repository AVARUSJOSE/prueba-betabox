<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="nav-wrap">
        <div class="mobile-only-brand pull-left">
            <div class="nav-header pull-left">
                <div class="logo-wrap">
                    <a href="{{ route('admin.dashboard') }}">
                        <h3>
                            {{ env('APP_NAME') }}
                        </h3>
                    </a>
                </div>
            </div>
            <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i
                    class="ti-align-left"></i></a>
            <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view"
                href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
            <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="ti-more"></i></a>
        </div>
        <div id="mobile_only_nav" class="mobile-only-nav pull-right">
            <ul class="nav navbar-right top-nav pull-right">
                <li>
                    <a href="{{ route('home') }}">
                        Ver la web
                    </a>
                </li>
                <li class="dropdown auth-drp">
                    <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">
                        <img src="{{ auth()->user()->imagePath }}" alt="user_auth" class="user-auth-img img-circle" />
                        <span class="user-online-status"></span>
                    </a>
                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                        <li class="divider"></li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST" class="d-none" id="logoutForm">
                                @csrf
                            </form>
                            <a href="#" onclick="document.getElementById('logoutForm').submit(); return false;"><i
                                    class="zmdi zmdi-power"></i><span>Cerrar sesión</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
