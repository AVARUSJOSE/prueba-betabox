<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Menú</span>
            <hr />
        </li>
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="pull-left">
                    <i class="ti-dashboard mr-20"></i>
                    <span class="right-nav-text">dashboard</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#posts_dr">
                <div class="pull-left"><i class="ti-image mr-20"></i><span class="right-nav-text">Posts</span></div>
                <div class="pull-right"><i class="ti-angle-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="posts_dr" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('admin.posts.create') }}">Crear Post</a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.index') }}">Listar Posts</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
