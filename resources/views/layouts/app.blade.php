<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>{{$menu}} | {{env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        @yield('style')
    </head>

    
    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    {{-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> --}}
                                </span>
                                <span class="logo-lg">
                                    {{-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20"> --}}
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    {{-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> --}}
                                </span>
                                <span class="logo-lg">
                                    {{-- <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20"> --}}
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        {{-- <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="uil-search"></span>
                            </div>
                        </form> --}}
                    </div>

                </div>
            </header>
            <div class="vertical-menu">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="#" class="logo logo-dark">
                        <span class="logo-sm">
                            {{-- <img src="{{ asset('user/img/logo.jpeg') }}" class="logo" style="height: 52px; align-self: center;" /> --}}
                            {{-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> --}}
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('user/img/logo.jpeg') }}" class="logo" style="height: 52px; align-self: center;" />
                            {{-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20"> --}}
                        </span>
                    </a>

                    <a href="#" class="logo logo-light">
                        <span class="logo-sm">
                            {{-- <img src="{{ asset('user/img/logo.jpeg') }}" class="logo" style="height: 52px; align-self: center;" /> --}}
                            {{-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> --}}
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('user/img/logo.jpeg') }}" class="logo" style="height: 52px; align-self: center;" />
                            {{-- <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20"> --}}
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div data-simplebar class="sidebar-menu-scroll">
                    @include('cms.layouts.menu', ['menu' => $menu])
                </div>
            </div>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('breadcrump')
                        @yield('content')
                    </div>
                </div>
                @include('cms.layouts.footer')
            </div>
        </div>
        <div class="rightbar-overlay"></div>

        <div style="z-index: 11" class="position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast overflow-hidden mt-3" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="align-items-center text-white bg-{{isset($_GET['status-message']) ? $_GET['status-message'] : ''}} border-0">
                    <div class="d-flex">
                        <div class="toast-body">
                            @if (isset($_GET['message']))
                                {{$_GET['message']}}
                            @endif
                        </div>
                        <button 
                            type="button" 
                            class="btn-close btn-close-white me-2 m-auto" 
                            data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

        @yield('script')

        <!-- App js -->
        <script src="{{ asset('assets/js/pages/bootstrap-toasts.init.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script>
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            if(urlParams.get('message')) {
                $('#liveToast').show();
                setTimeout(() => {
                    $('#liveToast').fadeOut(1000);
                }, 3000);
            }
        </script>

    </body>

</html>