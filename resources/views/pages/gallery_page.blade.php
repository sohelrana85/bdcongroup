@extends('layouts.web_master')
@section('title', 'Gallery Page')
@section('main_content')

<div class="inner-banner inner-bg8">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Photo Gallery</h3>
            <ul>
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li>
                    <i class='bx bxs-chevron-right'></i>
                </li>
                <li>Photo Gallery</li>
            </ul>
        </div>
    </div>
</div>

<div class="team-area pt-4 pb-4">
    <div class="container">
        <div class="section-title text-center">
            <span>Our Gallery</span>
            <h2>Our Gallery</h2>
        </div>
        <div class="row border-bottom pt-4 pb-4">
            @foreach ($gallery as $item)
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img">
                        <a href="{{ asset($item->image) }}" data-lightbox="img">
                            <img src="{{ asset($item->image) }}" class="img-fluid" alt="Images">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
       
    </div>
</div>

@endsection
