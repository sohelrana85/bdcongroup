@extends('layouts.web_master')
@section('title', 'About')
@section('main_content')

    <div class="inner-banner inner-bg1">
        <div class="container">
            <div class="inner-title text-center">
                <h3>About Us</h3>
                <ul>
                    <li>
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li>
                        <i class='bx bxs-chevron-right'></i>
                    </li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="about-area pt-5 pb-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img about-img-before">
                        <img src="{{ asset($about->image) }}" alt="Images">
                        <div class="about-img-small">
                            {{-- <img src="{{ asset('website') }}/assets/img/about/about-img2.jpg" alt="Images"> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <span>About Us</span>
                        <h2>{{ $about->title }}</h2>
                        
                        {!! $about->description !!}
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="about-polygon-shape">
            <img src="{{ asset('website') }}/assets/img/shape/shape10.png" alt="Images">
        </div>
    </div>

    {{-- Clients section here --}}
    <div class="client-area-two pt-4 pb-4">
        <div class="container">
            <div class="section-title text-center">
                <span>Clients Review</span>
                <h2>Our Lovely Clients</h2>
            </div>
            <div class="client-slider owl-carousel owl-theme pt-4">
                @foreach ($clients as $item)   
                <div class="client-card">
                    <h3>{{ $item->name  }}</h3>
                    <span>{{ $item->designation  }}</span>
                    <ul>
                        <li>
                            {{-- <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i> --}}
                        </li>
                    </ul>
                    <p>
                        {!! $item->description !!}
                    </p>
                    <i class="flaticon-quote client-card-quote"></i>
                    <div class="client-card-img">
                        <img src="{{ asset($item->image) }}" alt="Images">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="client-shape">
            <div class="shape1">
                <img src="{{ asset('website') }}/assets/img/shape/shape8.png" alt="Images">
            </div>
            <div class="shape2">
                <img src="{{ asset('website') }}/assets/img/shape/shape6.png" alt="Images">
            </div>
            <div class="shape3">
                <img src="{{ asset('website') }}/assets/img/shape/shape11.png" alt="Images">
            </div>
        </div>
    </div>


@endsection