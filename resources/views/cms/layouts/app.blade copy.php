<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BANGBELI</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('cms/images/favicon.png') }}">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    @yield('style')

    <style>
        button>* {
            pointer-events: none;
        }
    </style>
</head>

<body style="width: 100% !important">
    <div
        style="display: grid;
        grid: auto-flow dense / min-content 1fr;"
        >

        <div>
            @include('cms.layouts.menu')
        </div>
        <main>
            @include('cms.layouts.header')
            @if (Session::has('message'))
                <div class="col-xl-12 col-xxl-12">
                    <div class="alert alert-{{ Session::get('alert') }} alert-dismissible alert-alt solid fade show">
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                    class="mdi mdi-close"></i></span>
                        </button>
                        @php
                            echo Session::get('message');
                        @endphp
                    </div>
                </div>
            @elseif ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="col-xl-12 col-xxl-12">
                        <div class="alert alert-warning alert-dismissible alert-alt solid fade show">
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                        class="mdi mdi-close"></i></span>
                            </button>
                            {{ $error }}
                        </div>
                    </div>
                @endforeach
            @endif
            @yield('content')
        </main>

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://sinudtech.web.id/"
                        target="_blank">SINUDTECH</a> 2020</p>
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

        <!-- apexcharts -->
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        @yield('javascript')

        <script type="text/javascript">
            $(document).ready(function() {
                $(".alert").slideDown(300).delay(4000).slideUp(300);
            });
        </script>
    </div>
</body>

</html>
