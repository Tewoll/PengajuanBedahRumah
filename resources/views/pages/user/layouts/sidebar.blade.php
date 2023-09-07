
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center bg-black-10">
            <!-- Logo -->
            <div>
                <span class="smini-visible fw-bold tracking-wide fs-lg">
                    c<span class="text-primary">b</span>
                </span>
                <a class="link-fx fw-bold tracking-wide mx-auto" href="index.html">
                    <span class="smini-hidden">
                        <i class="fa fa-fire text-primary"></i>
                        <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
                    </span>
                </a>
            </div>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Main Navigation -->
            <div class="content-side content-side-full">
                <!--
        Mobile navigation, desktop navigation can be found in #page-header

        If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
        -->
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('user/home') ? 'active' : '' }}" href="/">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Layout</li>
                        <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu {{ request()->is('user/data-diri') || request()->is('user/data-diri/*') || request()->is('user/data-pengajuan') || request()->is('user/data-pengajuan/*') ? 'active' : '' }}"
                                        data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fa fa-puzzle-piece"></i>
                                        <span class="nav-main-link-name">Menu</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link {{ request()->is('user/data-diri') ? 'active' : '' }}"
                                                href="{{ route('data-diri.index') }}">
                                                <span class="nav-main-link-name">Data Diri</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link {{ request()->is('user/data-pengajuan')|| request()->is('user/data-pengajuan/*') ? 'active' : '' }}"
                                                href="{{ url('user/data-pengajuan') }}">
                                                <span class="nav-main-link-name">Data Pengajuan</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                    <li class="nav-main-heading">Other Pages</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="bd_search.html">
                            <i class="nav-main-link-icon fa fa-search"></i>
                            <span class="nav-main-link-name">Search</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="/">
                            <i class="nav-main-link-icon fa fa-arrow-left"></i>
                            <span class="nav-main-link-name">Go Back</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Main Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </div>
    <!-- Sidebar Content -->
</nav>