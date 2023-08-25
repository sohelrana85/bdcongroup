@extends('layouts.web_master')
@section('title', 'Our Clients')
@section('main_content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown text-white">Clients</h1>
    </div>
</div>
<!-- Page Header End -->


<!-- Product Start -->
<div class="container-xxl py-4 our_client">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Clients</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($clients as $item) 
            <div class="col-lg-2 col-md-4 wow fadeInUp mb-3" data-wow-delay="0.1s">
                <a href="">
                    <div class="card">
                        <div class="card-body p-0 py-1">
                            <div class="row g-1">
                                <div class="col-md-4 col-4 align-items-center center">
                                    <img src="{{ asset($item->image) }}" class="work-image ps-1" alt="">
                                </div>
                                <div class="col-md-8 col-8 align-items-center align-self-center">
                                    <h5 class="card-title work-title">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- Product End -->

@endsection