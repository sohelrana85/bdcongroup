@extends('layouts.web_master')
@section('title', 'Product Details')
@section('main_content')

    <div class="inner-banner inner-bg11">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Product Details</h3>
                <ul>
                    <li>
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li>
                        <i class='bx bxs-chevron-right'></i>
                    </li>
                    <li>Product Details</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="product_detail pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="xzoom-container">
                        <img src="{{ asset($product->image) }}" class="xzoom w-100" xoriginal="{{ asset($product->image) }}" alt="">
                        <div class="xzoom-thumbs mt-2">
                            <a href="{{ asset($product->image) }}">
                                <img src="{{ asset($product->image) }}" class="xzoom-gallery" xpreview="{{ asset($product->image) }}" alt="">
                            </a>
                            @foreach ($product->images as $item)   
                            <a href="{{ asset($item->other_img) }}">
                                <img src="{{ asset($item->other_img) }}" class="xzoom-gallery" xpreview="{{ asset($item->other_img) }}" alt="">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-7 col-12">
                    <div class="right_details">
                        <h3>{{ $product->name }}</h3>
                        <div class="">
                            <h5 class="text-black">Price: ৳{{ $product->price }}</h5>
                        </div>
                        <div class="">
                            <p class=""><strong>Product Code:</strong> {{ $product->product_code }}</p>
                        </div>
                        <div class="">
                            <p class=""><strong>Category:</strong> {{ $product->category->name }}</p>
                        </div>

                        <div class="product_info py-3">
                            {!! Str::limit($product->description, 150) !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="product_detail pt-4 pb-4">
        <div class="container">
            <div class="row">
                <h5>Product Description</h5>
                <hr>
                <p>{!! $product->description !!}</p>
            </div>
        </div>
    </div>

    <div class="project-area pt-2 pb-4">
        <div class="container">
            <div class="project-title-two">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="tab project-tab text-center">
                
                <div class="tab_content pt-2">
                    <div class="tabs_item">
                        <div class="project-tab-item">
                            <div class="row">
                                @foreach ($related_product as $item)  
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
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('web_script')
    <script>
        $(function() {
            $(".xzoom, .xzoom-gallery").xzoom({
                zoomWith: 400,
                tint: "#333",
                Xoffset: 15
            });
        });
    </script>
@endpush
