@extends('front.layouts.master')

@section('title', 'Our Team')

@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-header">
                        <h2>Our Team</h2>
                        <ul class="list-inline ulockd-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Our Team</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="ulockd-team">
        <div class="container">
            <div class="row">
                @if(count($volunteers) > 0)
                    @foreach($volunteers as $volunteer)
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="ulockd-team-member">
                                <div class="team-thumb">
                                    <img class="img-responsive img-whp" src="{{ asset($volunteer->image) }}" alt="{{ $volunteer->f_name }}">
{{--                                    <div class="team-overlay">--}}
{{--                                        <ul class="list-inline team-icon style2">--}}
{{--                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="team-details text-left">
                                    <h3 class="member-name">{{ $volunteer->f_name }} {{ $volunteer->l_name }}</h3>
                                    <h5 class="member-post">- Volunteer</h5>
                                    <p>Lorem ipsum dolor sit amet, esse consectetur adipisicing elit.</p>
{{--                                    <button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
@endsection
