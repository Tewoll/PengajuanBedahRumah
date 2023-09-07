{{-- <header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="space-x-1">
            <!-- Logo -->
            <a class="link-fx fw-bold" href="{{ url('/') }}">
                <i class="fa fa-building text-primary"></i>
                <span class="fs-4 text-dual">bedah</span><span class="fs-4 text-primary">Rumah</span>
            </a>
            <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Middle Section -->
        <div class="d-none d-lg-block">
            <!-- Header Navigation -->
            <!-- Desktop Navigation, mobile navigation can be found in #sidebar -->
            <ul class="nav-main nav-main-horizontal nav-main-hover">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="bd_dashboard.html">
                        <i class="nav-main-link-icon fa fa-house-user"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-heading">Layout</li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-puzzle-piece"></i>
                        <span class="nav-main-link-name">Variations</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ url('/user/data-diri') }}">
                                <span class="nav-main-link-name">Data Diri</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_variations_hero_simple_2.html">
                                <span class="nav-main-link-name">Hero Simple 2</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_variations_hero_simple_3.html">
                                <span class="nav-main-link-name">Hero Simple 3</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_variations_hero_simple_4.html">
                                <span class="nav-main-link-name">Hero Simple 4</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_variations_hero_image_1.html">
                                <span class="nav-main-link-name">Hero Image 1</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_variations_hero_image_2.html">
                                <span class="nav-main-link-name">Hero Image 2</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_variations_hero_image_3.html">
                                <span class="nav-main-link-name">Hero Image 3</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_variations_hero_image_4.html">
                                <span class="nav-main-link-name">Hero Image 4</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_variations_hero_video_1.html">
                                <span class="nav-main-link-name">Hero Video 1</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_variations_hero_video_2.html">
                                <span class="nav-main-link-name">Hero Video 2</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <span class="nav-main-link-name">More Options</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="javascript:void(0)">
                                        <span class="nav-main-link-name">Another Link</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="javascript:void(0)">
                                        <span class="nav-main-link-name">Another Link</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="javascript:void(0)">
                                        <span class="nav-main-link-name">Another Link</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END Header Navigation -->
        </div>
        <!-- END Middle Section -->

        <!-- Right Section -->
        <div class="space-x-1">

            <!-- Notifications -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag"></i>
                    <span class="text-primary">&bull;</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications">
                    <div class="px-2 py-3 bg-body-light rounded-top">
                        <h5 class="h6 text-center mb-0">
                            Notifications
                        </h5>
                    </div>
                    <ul class="nav-items my-2 fs-sm">
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-check text-success"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <p class="fw-medium mb-1">You’ve upgraded to a VIP account successfully!</p>
                                    <div class="text-muted">15 min ago</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <p class="fw-medium mb-1">Please check your payment info since we can’t validate
                                        them!</p>
                                    <div class="text-muted">50 min ago</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-times text-danger"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <p class="fw-medium mb-1">Web server stopped responding and it was automatically
                                        restarted!</p>
                                    <div class="text-muted">4 hours ago</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <p class="fw-medium mb-1">Please consider upgrading your plan. You are running out
                                        of space.</p>
                                    <div class="text-muted">16 hours ago</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-plus text-primary"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <p class="fw-medium mb-1">New purchases! +$250</p>
                                    <div class="text-muted">1 day ago</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="p-2 bg-body-light rounded-bottom">
                        <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
                            <i class="fa fa-fw fa-flag opacity-50 me-1"></i> View All
                        </a>
                    </div>
                </div>
            </div>
            <!-- END Notifications -->
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block fw-semibold">
                        @if (Auth::check())
                            {{ implode(', ',Auth::user()->roles->pluck('name')->toArray()) }}
                        @endif
                    </span>
                    <i class="fa fa-angle-down opacity-50 ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="px-2 py-3 bg-body-light rounded-top">
                        <h5 class="h6 text-center mb-0">
                            @if (Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                        </h5>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                            href="{{ route('profile.edit') }}">
                            <span>Profile</span>
                            <i class="fa fa-fw fa-user opacity-25"></i>
                        </a>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                            onclick="showAlert('logout-form')">
                            <span>Sign Out</span>
                            <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                        </button>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->

            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="far fa-sun fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header> --}}

<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="space-x-1 d-flex align-items-center space-x-2">
            <!-- Logo -->
            <a class="link-fx fw-bold" href="index.html">
                <i class="fa fa-fire text-primary"></i>
                <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
            </a>
            <!-- END Logo -->

            <!-- Version -->
            <span class="d-inline-block fs-xs fw-medium bg-primary-dark text-white rounded-pill py-1 px-2">5.1</span>
            <!-- END Version -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="space-x-1">
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="btn btn-alt-secondary px-3" data-toggle="layout" data-action="dark_mode_toggle"
                href="javascript:void(0)">
                <i class="fa fa-burn"></i>
            </a>
            <a class="btn btn-alt-primary px-3 d-none d-sm-inline-block" href="be_pages_dashboard.html" target="_blank">
                <i class="fa fa-rocket opacity-50"></i>
                <span class="ms-1 d-none d-sm-inline-block">Live Preview</span>
            </a>
            <a class="btn btn-alt-success px-3" href="https://1.envato.market/95j">
                <i class="fa fa-shopping-bag opacity-50"></i>
                <span class="ms-1 d-none d-sm-inline-block">Purchase</span>
            </a>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block fw-semibold">
                        @if (Auth::check())
                            {{ implode(', ',Auth::user()->roles->pluck('name')->toArray()) }}
                        @endif
                    </span>
                    <i class="fa fa-angle-down opacity-50 ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="px-2 py-3 bg-body-light rounded-top">
                        <h5 class="h6 text-center mb-0">
                            @if (Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                        </h5>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                            href="{{ route('profile.edit') }}">
                            <span>Profile</span>
                            <i class="fa fa-fw fa-user opacity-25"></i>
                        </a>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                            onclick="showAlert('logout-form')">
                            <span>Sign Out</span>
                            <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                        </button>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
</header>

@push('custom-script')
    <script>
        function showAlert(formId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log me out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form to perform logout
                    document.getElementById(formId).submit();
                } else {
                    // If user cancels logout, show a cancellation message
                    Swal.fire(
                        'Cancelled',
                        'You are still logged in :)',
                        'info'
                    );
                }
            });
        }
    </script>
@endpush
