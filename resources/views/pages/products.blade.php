@extends('layouts.web_master')
@section('title', 'Products')
@section('main_content')

    <div class="inner-banner inner-bg11">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Products</h3>
                <ul>
                    <li>
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li>
                        <i class='bx bxs-chevron-right'></i>
                    </li>
                    <li>Products</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="product-section">
        <div class="container">
            <div class="tab project-tab text-center">   
                <div class="tab_content pt-2">
                    <div class="tabs_item">
                        <div class="project-tab-item">
                            <div class="row">
                                @if ($products->count() > 0)  
                                    @foreach ($products as $item)  
                                    <div class="col-lg-3 col-md-6">
                                        <div class="project-card">
                                            <a href="{{ route('product.single', $item->slug) }}">
                                                <img src="{{ asset($item->image) }}" alt="Images">
                                            </a>
                                            <div class="project-content project-content-bg">
                                                <h3><a href="{{ route('product.single', $item->slug) }}">{{ $item->name }}</a></h3>
                                                <div class="content">
                                                    <h5>৳{{ $item->price }}</h5>
                                                    <a href="{{ route('product.single', $item->slug) }}" class="project-more">
                                                        View Details<i class='flaticon-double-right-arrows-angles'></i>
                                                    </a>
                                                </div>
                                                <div class="project-card-bottom"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center">
                                        <h5 class="text-danger py-5">Product Not Found!</h5>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="d-flex justify-content-center">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection


