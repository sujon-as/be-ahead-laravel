<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/dashboard')}}" class="brand-link">
        <img src="{{asset('back/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            {{ ($settings && $settings->site_name) ? $settings->site_name : 'Charity Org' }}
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('back/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/" class="d-block">{{ Auth::user()->name ?? '' }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{URL::to('/dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <li class="nav-item {{ Request::is('sliders*') ? 'menu-open' : '' }}">
                    <a href="{{ route('sliders.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sliders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sliders.create') }}" class="nav-link {{ request()->routeIs('sliders.create') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sliders.index') }}" class="nav-link {{ request()->routeIs('sliders.index') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Slider</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ Request::is('features*') ? 'menu-open' : '' }}">
                    <a href="{{ route('features.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Features
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('features.create') }}"
                               class="nav-link {{ request()->routeIs('features.create') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Feature</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('features.index') }}"
                               class="nav-link {{ request()->routeIs('features.index') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Feature</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{( Request::is('cause-titles*') || Request::is('front-causes*')) ? 'menu-open' : '' }}">
                    <a href="{{ route('cause-titles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Causes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cause-titles.index') }}"
                               class="nav-link {{ request()->routeIs('cause-titles.index') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cause Title</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front-causes.index') }}"
                               class="nav-link {{ request()->routeIs('front-causes.index') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Causes</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{( Request::is('recent-cause-titles*') || Request::is('front-recent-causes*')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Recent Causes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('recent-cause-titles.index') }}"
                               class="nav-link {{ request()->routeIs('recent-cause-titles.index') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recent Cause Title</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front-recent-causes.index') }}"
                               class="nav-link {{ request()->routeIs('front-recent-causes.index') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recent Causes</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ Request::is('why-choose-us*') ? 'menu-open' : '' }}">
                <a href="{{ route('why-choose-us.index') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Why Choose Us
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('about-us*') ? 'menu-open' : '' }}">
                <a href="{{ route('about-us.index') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            About Us
                        </p>
                    </a>
                </li>

                <li class="nav-item
                    {{
                    (Request::is('galleries*') || Request::is('gallery-categories*') || Request::is('gallery-images*')) ? 'menu-open' : ''
                    }}"
                >
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Gallery
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('galleries.index') }}"
                               class="nav-link {{ request()->routeIs('galleries.*') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Content</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gallery-categories.index') }}"
                               class="nav-link {{ request()->routeIs('gallery-categories.index') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gallery-images.index') }}"
                               class="nav-link {{ request()->routeIs('gallery-images.index') ? 'active_nav_menu' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery Images</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ Request::is('settings') ? 'menu-open' : '' }}">
                    <a href="{{ route('settings') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

                <li class="nav-header">EXAMPLES</li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
