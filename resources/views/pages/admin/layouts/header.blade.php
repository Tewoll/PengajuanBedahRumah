<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="space-x-1">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Open Search Section -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                data-action="header_search_on">
                <i class="fa fa-fw fa-search"></i>
            </button>
            <!-- END Open Search Section -->

            <!-- Color Themes (used just for demonstration) -->
            <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-themes-dropdown"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-paint-brush"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg p-0" aria-labelledby="page-header-themes-dropdown">
                    <div class="p-3 bg-body-light rounded-top">
                        <h5 class="h6 text-center mb-0">
                            Color Themes
                        </h5>
                    </div>
                    <div class="p-3">
                        <div class="row g-0 text-center">
                            <div class="col-2">
                                <a class="text-default" data-toggle="theme" data-theme="default"
                                    href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-elegance" data-toggle="theme"
                                    data-theme="assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-pulse" data-toggle="theme"
                                    data-theme="{{ url('assets/css/themes/pulse.min.css') }}" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-flat" data-toggle="theme"
                                    data-theme="{{ url('assets/css/themes/flat.min.css') }}" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-corporate" data-toggle="theme"
                                    data-theme="{{ url('assets/css/themes/corporate.min.css') }}"
                                    href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a class="text-earth" data-toggle="theme"
                                    data-theme="{{ url('assets/css/themes/earth.min.css') }}" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Color Themes -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="space-x-1">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block fw-semibold">
                        @if (Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                    </span>
                    <i class="fa fa-angle-down opacity-50 ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="px-2 py-3 bg-body-light rounded-top">
                        <h5 class="h6 text-center mb-0">
                            Roles:
                            @if (Auth::check())
                                {{ implode(', ',Auth::user()->roles->pluck('name')->toArray()) }}
                            @endif 
                        </h5>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                            href="{{ route('profile.edit') }}">
                            <span>Profile</span>
                            <i class="fa fa-fw fa-user opacity-25"></i>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="be_pages_generic_inbox.html">
                            <span>Inbox</span>
                            <i class="fa fa-fw fa-envelope-open opacity-25"></i>
                        </a>
                        {{-- <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                            href="be_pages_generic_invoice.html">
                            <span>Invoices</span>
                            <i class="fa fa-fw fa-file opacity-25"></i>
                        </a> --}}
                        <div class="dropdown-divider"></div>

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                            href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                            <span>Settings</span>
                            <i class="fa fa-fw fa-wrench opacity-25"></i>
                        </a>
                        <!-- END Side Overlay -->

                        <div class="dropdown-divider"></div>

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

            <!-- Toggle Side Overlay -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
            {{-- <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                data-action="side_overlay_toggle">
                <i class="fa fa-fw fa-stream"></i>
            </button> --}}
            <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-body-extra-light">
        <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                <div class="input-group">
                    <!-- Close Search Section -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-secondary" data-toggle="layout"
                        data-action="header_search_off">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                    <!-- END Close Search Section -->
                    <input type="text" class="form-control" placeholder="Search or hit ESC.."
                        id="page-header-search-input" name="page-header-search-input">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="far fa-sun fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->
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