@extends('front.layouts.master')

@section('title', 'About Us')

@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-header">
                        <h2>About Us</h2>
                        <ul class="list-inline ulockd-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our About -->
    <section class="ulockd-about">
        <div class="container">
            @if($aboutUs)
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="ulock-about">
                            {!! $aboutUs->title !!}
                            {!! $aboutUs->description !!}
                            <a href="{{ route('donation') }}">
                                <button type="button" class="btn btn-default ulockd-btn-thm2">Donate</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="ulockd-about-box ulockd-mrgn1260">
                            <div class="ab-thumb">
                                <img class="img-responsive img-whp" src="{{ asset($aboutUs->img) }}" alt="1.jpg" loading="lazy">
                            </div>
                            <p class="text-center ulockd-mrgn1210">
                                {{ $aboutUs->img_short_text }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
