<aside id="side-overlay">
    <!-- Side Header -->
    <div class="content-header">
        <!-- User Avatar -->
        <a class="img-link me-2" href="be_pages_generic_profile.html">
            <img class="img-avatar img-avatar32" src="{{ url('assets/media/avatars/avatar15.jpg') }}" alt="">
        </a>
        <!-- END User Avatar -->

        <!-- User Info -->
        <a class="link-fx text-body-color-dark fw-semibold fs-sm" href="be_pages_generic_profile.html">
            Admin
        </a>
        <!-- END User Info -->

        <!-- Close Side Overlay -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <button type="button" class="btn btn-sm btn-alt-danger ms-auto" data-toggle="layout"
            data-action="side_overlay_close">
            <i class="fa fa-fw fa-times"></i>
        </button>
        <!-- END Close Side Overlay -->
    </div>
    <!-- END Side Header -->

    <!-- Side Content -->
    <div class="content-side">
        <!-- Search -->
        <div class="block pull-t pull-x">
            <div class="block-content block-content-full block-content-sm bg-body-light">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search"
                            placeholder="Search..">
                        <button type="submit" class="btn btn-secondary px-2">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Search -->

        <!-- Mini Stats -->
        <div class="block pull-x">
            <div class="block-content block-content-full block-content-sm bg-body-light">
                <div class="row">
                    <div class="col-4">
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Stat</div>
                        <div class="fs-4">100</div>
                    </div>
                    <div class="col-4">
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Stat</div>
                        <div class="fs-4">200</div>
                    </div>
                    <div class="col-4">
                        <div class="fs-sm fw-semibold text-uppercase text-muted">Stat</div>
                        <div class="fs-4">300</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Mini Stats -->

        <!-- Block -->
        <div class="block pull-x">
            <div class="block-header bg-body-light">
                <h3 class="block-title">Title</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                        data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                        data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <p>Content...</p>
            </div>
        </div>
        <!-- END Block -->
    </div>
    <!-- END Side Content -->
</aside>
<!-- END Side Overlay -->

<!-- Sidebar -->
<!--
Helper classes

Adding .smini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
Adding .smini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
  If you would like to disable the transition, just add the .no-transition along with one of the previous 2 classes

Adding .smini-hidden to an element will hide it when the sidebar is in mini mode
Adding .smini-visible to an element will show it only when the sidebar is in mini mode
Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
-->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center">
            <!-- Logo -->
            <div>
                <span class="smini-visible fw-bold tracking-wide fs-lg">
                    c<span class="text-primary">b</span>
                </span>
                <a class="link-fx fw-bold tracking-wide mx-auto" href="index.html">
                    <span class="smini-hidden">
                        <i class="fa fa-fire text-primary"></i>
                        <span class="fs-4 text-dual">bedah</span><span class="fs-4 text-primary">Rumah</span>
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
            <!-- Side User -->
            <div class="content-side content-side-user px-0 py-0">
                <!-- Visible only in mini mode -->
                <div class="smini-visible-block animated fadeIn px-2">
                    <img class="img-avatar img-avatar32" src="{{ url('assets/media/avatars/avatar15.jpg') }}"
                        alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="smini-hidden text-center mx-auto">
                    <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar" src="{{ url('assets/media/avatars/avatar15.jpg') }}" alt="">
                    </a>
                    <ul class="list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a class="link-fx text-dual fs-sm fw-semibold text-uppercase"
                                href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="link-fx text-dual" data-toggle="layout" data-action="dark_mode_toggle"
                                href="javascript:void(0)">
                                <i class="fa fa-burn"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-fx text-dual"
                                onclick="showAlert('logout-form')">
                                <i class="fa fa-sign-out-alt"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Menu</li>
                    {{-- <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-puzzle-piece"></i>
                            <span class="nav-main-link-name">Dropdown</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:void(0)">
                                    <span class="nav-main-link-name">Link #1</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:void(0)">
                                    <span class="nav-main-link-name">Link #2</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->routeIs('permohonan.index') ? 'active' : '' }}" href="{{ route('permohonan.index') }}"">
                            <i class="nav-main-link-icon fa fa-hourglass"></i>
                            <span class="nav-main-link-name">Permohonan</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->routeIs('verifikasi-lanjut.index') ? 'active' : '' }}" href="{{ route('verifikasi-lanjut.index') }}">
                            <i class="nav-main-link-icon fa  fa fa-user-check"></i>
                            <span class="nav-main-link-name">Verifikasi</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('laporan') || request()->is('laporan/*') ? 'active' : '' }}" href="{{ route('laporan.index') }}">
                            <i class="nav-main-link-icon fa fa-file-export"></i>
                            <span class="nav-main-link-name">Laporan</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-layer-group"></i>
                            <span class="nav-main-link-name">Master Data</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link {{ request()->routeIs('pengguna.index') ? 'active' : '' }}" href="{{ route('pengguna.index') }}">
                                    <span class="nav-main-link-name">Data Pengguna</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </div>
    <!-- Sidebar Content -->
</nav>
