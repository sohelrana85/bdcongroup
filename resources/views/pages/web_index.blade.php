@extends('layouts.web_master')
@section('title', 'Home')
@section('main_content')

    @include('partials.slider')

    {{-- <div class="guidelines-area-two py-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-5 ps-0">
                    <div class="guidelines-img">
                        <img src="{{ asset($about->image) }}" height="700" width="100%" alt="Images">
                    </div>
                </div>
                <div class="col-lg-7 pe-0">
                    <div class="guidelines-content-bg">
                        <div class="guidelines-content-two">
                            <h2>{{ $about->title }}</h2>
                            {!! Str::limit($about->description, 750) !!}
                            <div class="signature">
                                <img src="{{ asset($about->signature) }}" alt="Images">
                            </div>
                            <div class="content">
                                <h3>{{ $about->name }}</h3>
                                <span>{{ $about->designation }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="mission_vision pt-2 pb-4">
        <div class="container">
            <div class="tab project-tab text-center">
                <div class="tab_content pt-2">
                    <div class="tabs_item">
                        <div class="project-tab-item">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mission_card"
                                        style="background-image: url({{ asset('images/card_bg.png') }})">
                                        <h4>Our Vision</h4>
                                        <p>{!! $mission_vision->vision_desc !!}</p>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mission_card"
                                        style="background-image: url({{ asset('images/card_bg.png') }})">
                                        <h4>Our Mission</h4>
                                        <p>{!! $mission_vision->mission_desc !!}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Our Product section -->
    {{-- <div class="project-area pt-4 pb-4">
        <div class="container">
            <div class="project-title-two">
                <div class="section-title">
                    <h2>Our Projects</h2>
                </div>
            </div>
            <div class="tab project-tab text-center">

                <div class="tab_content pt-2">
                    <div class="tabs_item">
                        <div class="project-tab-item">
                            <div class="row">
                                @foreach ($home_products as $item)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="project-card">
                                            <a href=""> <img src="{{ asset($item->image) }}" alt="Images">
                                            </a>
                                            <div class="project-content project-content-bg">
                                                <h3><a href="">{{ $item->name }}</a>
                                                </h3>
                                                <div class="content">
                                                    <h5>৳{{ $item->price }}</h5>
                                                    <a href="" class="project-more"> View Details
                                                    </a>
                                                </div>
                                                <div class="project-card-bottom"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="project-view-btn text-center">
                                <a href="{{ route('products') }}" class="view-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Our Product section -->
    {{-- <div class="project-area pt-4 pb-4">
        <div class="container">
            <div class="project-title-two">
                <div class="section-title">
                    <h2>Our Services</h2>
                </div>
            </div>
            <div class="tab project-tab text-center">

                <div class="tab_content pt-2">
                    <div class="tabs_item">
                        <div class="project-tab-item">
                            <div class="row">
                                @foreach ($home_products as $item)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="project-card">
                                            <a href="">
                                                <img src="{{ asset($item->image) }}" alt="Images">
                                            </a>
                                            <div class="project-content project-content-bg">
                                                <h3><a href="">{{ $item->name }}</a>
                                                    href="{{ route('product.single', $item->slug) }}">{{ $item->name }}</a>
                                                </h3>
                                                <div class="content">
                                                    <h5>৳{{ $item->price }}</h5>
                                                    <a href="" class="project-more"> View Details
                                                        <i class='flaticon-double-right-arrows-angles'></i>
                                                    </a>
                                                </div>
                                                <div class="project-card-bottom"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="project-view-btn text-center">
                                <a href="{{ route('products') }}" class="view-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Our Brand section -->
    {{-- <div class="brand-area pt-2 pb-2">
    <div class="container">
        <div class="project-title-two">
            <div class="section-title">
                <span>Our Brand</span>
                <h2>Some Of Our Brand</h2>
            </div>
        </div>
        <div class="tab project-tab text-center">
            
            <div class="tab_content pt-2">
                <div class="tabs_item">
                    <div class="project-tab-item">
                        <div class="row brand-slider owl-carousel owl-theme ">
                            @foreach ($brand as $item)  
                            <div class="items">
                                <div class="project-card">
                                    <a href="{{ route('product.brand', $item->id) }}">
                                        <img src="{{ asset($item->image) }}" alt="Images">
                                    </a>
                                    <h3><a href="{{ route('product.brand', $item->id) }}">{{ $item->name }}</a></h3>     
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    {{-- client review --}}
    {{-- <div class="client-area-two pt-4 pb-4">
        <div class="container">
            <div class="section-title text-center">
                <span>Clients Review</span>
                <h2>Our Clients Get Helped</h2>
            </div>
            <div class="client-slider owl-carousel owl-theme pt-4">
                @foreach ($clients as $item)
                    <div class="client-card">
                        <h3>{{ $item->name }}</h3>
                        <span>{{ $item->designation }}</span>
                        <ul>
                            <li>
                            </li>
                        </ul>
                        <p>{!! $item->description !!}</p>

                        <i class="flaticon-quote client-card-quote"></i>
                        <div class="client-card-img">
                            <img src="{{ asset($item->image) }}" alt="Images">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
@endsection
