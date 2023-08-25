<header class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="text-center col-lg-7 col-lg-text-start">
                <div class="header-left">
                    <div class="header-left-card">
                        <ul>
                            <li>
                                <div class="head-icon">
                                    <i class='bx bxs-envelope'></i>
                                </div>
                                <a href="mailto:{{ $content->email }}">
                                    <span class="__cf_email__"
                                        data-cfemail="224b4c444d62444b4c47410c414d4f">{{ $content->email }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center col-lg-5 col-lg-text-start">
                <div class="header-right">
                    <div class="top-social-link">
                        <ul>
                            <li>
                                <a href="{{ $content->facebook }}" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $content->twitter }}" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $content->instagram }}" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $content->youtube }}" target="_blank">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>

<div class="navbar-area">
    <div class="mobile-nav">
        <a href="{{ route('index') }}" class="logo">
            <img src="{{ asset($content->logo) }}" class="logo-one" alt="Logo">
        </a>
        <h4>{{ $content->com_name }}</h4>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset($content->logo) }}" class="logo-one" alt="Logo">
                    <img src="{{ asset($content->logo) }}" class="logo-two" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link {{ Route::is('index') ? 'active' : '' }}">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:" class="nav-link">
                                About
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link {{ Route::is('about') ? 'active' : '' }}">
                                About
                            </a>
                        </li> --}}

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Our Project
                                <i class='bx bx-chevron-down'></i>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="#" id="navbarDropdown1" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Current Project
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <a class="dropdown-item" href="#" id="navbarDropdown2" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Complete Project
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="serviceDown" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Service
                                <i class='bx bx-chevron-down'></i>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="serviceDown">
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="#" id="navbarDropdown1" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Construction Works
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <a class="dropdown-item" href="#" id="navbarDropdown2" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Construction Management
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Construction Product Supply
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="javascript:" class="nav-link">
                                News & Event
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:" class="nav-link">
                                Contact
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="{{ route('management') }}"
                                class="nav-link {{ Route::is('management') ? 'active' : '' }}">
                                Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gallery.page') }}"
                                class="nav-link {{ Route::is('gallery.page') ? 'active' : '' }}">
                                Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}"
                                class="nav-link {{ Route::is('contact') ? 'active' : '' }}">
                                Contact
                            </a>
                        </li> --}}
                    </ul>
                    <!-- <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <i class='search-btn bx bx-search'></i>
                            <i class='close-btn bx bx-x'></i>
                            <div class="search-overlay search-popup">
                                <div class='search-box'>
                                    <form class="search-form">
                                        <input class="search-input" name="search" placeholder="Search" type="text">
                                        <button class="search-button" type="submit">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div> -->
                </div>
            </nav>
        </div>
    </div>
    <div class="side-nav-responsive">
        <div class="container">

            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-item">
                            <div class="option-item">
                                <div class="menu-icon d-in-line">
                                    <a href="#" class="burger-menu menu-icon-two">
                                        <i class='flaticon-menu'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="side-item">
                            <div class="option-item">
                                <i class='search-btn bx bx-search'></i>
                                <i class='close-btn bx bx-x'></i>
                                <div class="search-overlay search-popup">
                                    <div class='search-box'>
                                        <form class="search-form">
                                            <input class="search-input" name="search" placeholder="Search"
                                                type="text">
                                            <button class="search-button" type="submit">
                                                <i class="bx bx-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('web_script')
    <script>
        (function($) {
            var defaults = {
                sm: 540,
                md: 720,
                lg: 960,
                xl: 1140,
                navbar_expand: 'lg'
            };
            $.fn.bootnavbar = function() {

                var screen_width = $(document).width();

                if (screen_width >= defaults.lg) {
                    $(this).find('.dropdown').hover(function() {
                        $(this).addClass('show');
                        $(this).find('.dropdown-menu').first().addClass('show').addClass('animated fadeIn')
                            .one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd',
                                function() {
                                    $(this).removeClass('animated fadeIn');
                                });
                    }, function() {
                        $(this).removeClass('show');
                        $(this).find('.dropdown-menu').first().removeClass('show');
                    });
                }

                $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
                    if (!$(this).next().hasClass('show')) {
                        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
                    }
                    var $subMenu = $(this).next(".dropdown-menu");
                    $subMenu.toggleClass('show');

                    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                        $('.dropdown-submenu .show').removeClass("show");
                    });

                    return false;
                });
            };
        })(jQuery);
    </script>
@endpush
