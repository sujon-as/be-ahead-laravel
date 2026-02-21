@extends('front.layouts.master')

@section('title', 'Appointment')

@section('content')
    <!-- Home Design Inner Pages -->
    <div class="ulockd-inner-home">
        <div class="container text-center">
            <div class="row">
                <div class="ulockd-inner-conraimer-details">
                    <div class="col-md-12">
                        <h1 class="text-uppercase">APPOINTMENT</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Home Design Inner Pages -->
    <div class="ulockd-inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="{{ route('home') }}"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="{{ route('appointment') }}"> APPOINTMENT </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our About -->
    <section class="ulockd-about-one inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-7">
                    <!-- Appointment Form Starts -->
                    @include('front.partials.appointment-form')
                </div>
                <div class="col-sm-12 col-md-4">
                    @if($appointmentTitle)
                        @include('front.partials.appointment-hero')
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Our About Page faq Section -->
    <section class="ulockd-ap-faq">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    {!! $faqTitle->title_2 ?? '' !!}
                    @if($faqTitle->yt_video_link)
                        <div class="ulockd-about-video ulockd-mrgn1225">
                            <iframe width="100%" height="465px" src="{{ $faqTitle->yt_video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                   <div class="ulockd-faq-box">
                        <div class="ulockd-faq-title clearfix">
                            {!! $faqTitle->title_1 ?? '' !!}
                        </div>
                       @if(count($faqs) > 0)
                           @include('front.partials.faq-content')
                       @endif
                   </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our First Divider -->
    @include('front.partials.appointment-faq')

    <!-- Our Team -->
    @if(count($volunteers) > 0)
        @include('front.partials.home-team')
    @endif
@endsection

@section('scripts')

@endsection
