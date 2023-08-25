<!doctype html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $content->com_name }} | @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('website') }}/assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/fonts/flaticon.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/theme-dark.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/lightbox.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="spinner"></div>
            </div>
        </div>
    </div>

    @include('partials.web_header')

    @yield('main_content')

    <!-- Footer Start -->
    @include('partials.web_footer')
    <!-- Footer Area End -->



    <!-- Vendor JS -->
    <script src="{{ asset('website/assets/js/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('website/assets/js/zoom.js') }}"></script> --}}
    <script src="{{ asset('website/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/meanmenu.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('website/assets/js/custom.js') }}"></script>
    <script src="{{ asset('website/assets/js/lightbox.js') }}"></script>

    @stack('web_script')
</body>

</html>
