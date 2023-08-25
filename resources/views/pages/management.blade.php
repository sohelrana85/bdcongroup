@extends('layouts.web_master')
@section('title', 'Management Page')
@section('main_content')

    <div class="inner-banner inner-bg8">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Management</h3>
                <ul>
                    <li>
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li>
                        <i class='bx bxs-chevron-right'></i>
                    </li>
                    <li>Management</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="team-area pt-4 pb-4">
        <div class="container">
            <div class="section-title text-center">
                <span>Our Management</span>
                <h2>Our Best Management</h2>
            </div>
            <div class="row border-bottom pt-4 pb-4">
                @foreach ($management as $item)   
                <div class="col-lg-3 col-md-6">
                    <div class="team-card team_card">
                        <div class="team-img">
                            <img src="{{ asset($item->image) }}" alt="Images">
                            {{-- <div class="social-icon">
                                <ul class="social-link">
                                    <li>
                                        <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="content">
                            <h3>{{ $item->name }}</h3>
                            <span>{{ $item->designation }}</span><br>
                            <span>{{ $item->phone }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection