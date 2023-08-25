@extends('layouts.web_master')
@section('title', 'News & Event Details')
@section('main_content')

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">News Event Details</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">News Event Details</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec Blog page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-blogs-rightside col-lg-9 col-md-12">

                    <!-- Blog content Start -->
                    <div class="ec-blogs-content">
                        <div class="ec-blogs-inner p-3">
                            <div class="ec-blog-main-img">
                                <img class="blog-image" src="{{ asset($newsevent->image) }}" width="100%" alt="Blog" />
                            </div>
                            <div class="ec-blog-date">
                                <p class="date">{{ date('F j, Y',strtotime($newsevent->created_at)) }} </p>
                            </div>
                            <div class="ec-blog-detail">
                                <h3 class="ec-blog-title">{{ $newsevent->title }}</h3>
                                
                                {!! $newsevent->description !!}
                            </div>
                            
                        </div>
                    </div>
                    <!--Blog content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside col-lg-3 col-md-12">
                    <div id="shop_sidebar" class="product_sidebar">
                        <div class="ec-sidebar-heading">
                            <h1><a href="">Learn More About</a></h1>
                        </div>
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Recent Blog Block -->
                            <div class="ec-sidebar-block ec-sidebar-recent-blog">
                                <div class="ec-sb-block-content">
                                    
                                    <div class="ec-sidebar-block-item">
                                        <a href="{{ route('contact') }}">
                                            <div class="product_icon">
                                                <i class="ecicon eci-map-marker"></i>
                                            </div>
                                            <div class="">
                                                <h5 class="ec-blog-title">
                                                    Our Location
                                                </h5>
                                                <div class="ec-blog-date">Find us near you</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="ec-sidebar-block-item">
                                        <a href="tel:{{ $content->phone }}">
                                            <div class="product_icon">
                                                <i class="ecicon eci-phone"></i>
                                            </div>
                                            <div class="">
                                                <h5 class="ec-blog-title">
                                                    Call Us Now
                                                </h5>
                                                <div class="ec-blog-date">
                                                    Call us at {{ $content->phone }} <br>
                                                    Hot Line {{ $content->phone_two }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
    
                                </div>
                            </div>
                            <!-- Sidebar Recent Blog Block -->
                        </div>
                        
                    </div>
                </div>
                {{-- <div class="ec-blogs-leftside col-lg-4 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Recent Blog Block -->
                        <div class="ec-sidebar-block ec-sidebar-recent-blog">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Recent Post</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                @foreach ($recent_post as $item)
                                <div class="ec-sidebar-block-item">
                                    <h5 class="ec-blog-title"><a href="{{ route('newsevent.single', $item->slug) }}">{{ $item->title }}</a></h5>
                                    <div class="ec-blog-date">{{ date('F j, Y',strtotime($item->created_at)) }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Sidebar Recent Blog Block -->
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

@endsection