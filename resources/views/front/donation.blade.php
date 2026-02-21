@extends('front.layouts.master')

@section('title', 'Donation')

@section('content')
    <!-- Home Design Inner Pages -->
    <div class="ulockd-inner-home">
        <div class="container text-center">
            <div class="row">
                <div class="ulockd-inner-conraimer-details">
                    <div class="col-md-12">
                        <h1 class="text-uppercase">DONATION</h1>
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
                            <li> <a href="{{ route('donation') }}"> DONATION </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our About -->
    <section class="ulockd-about2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            @if(count($causes) > 0)
                                {{--        @include('front.partials.home-causes')--}}
                                @include('front.partials.home-causes-2')
                            @endif
                        </div>
                        @include('front.partials.donation-form')
                    </div>
                </div>
                <!--
                <div class="col-md-4 col-lg-3 ulockd-pdng0">
                    <h3 class="ulockd-bb-dashed"><span class="flaticon-straight-quotes text-thm1"></span> Testimonial</h3>
                    <div class="ulockd-inr-testimonials">
                        <p>pain was born and I will give you a complete accounf the system, and expound the actuteachings of the grea</p>
                        <div class="ulockd-tm-client-details">
                            <div class="ulockd-tm-name">
                                <h4 class="text-thm1">Gary Watson - <small> Seo</small></h4>
                            </div>
                        </div>
                    </div>
                    <h3 class="ulockd-bb-dashed"><span class="flaticon-calendar text-thm1"></span> Latest Post</h3>
                    <div class="ulockd-lp">
                        <div class="ulockd-latest-post">
                            <div class="media">
                                <div class="media-left pull-left">
                                    <a href="#">
                                        <img class="media-object thumbnail" src="{{ asset('front/images/testimonial/1.jpg') }}" alt="1.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Ana Andreea</h4>
                                    I have constantly believed Be aHand to take care of their patain <a href="#">more...</a>
                                    <strong><a href="#"> 20 Jan 2017 </a></strong>
                                </div>
                            </div>
                        </div>
                        <div class="ulockd-latest-post">
                            <div class="media">
                                <div class="media-left pull-left">
                                    <a href="#">
                                        <img class="media-object thumbnail" src="{{ asset('front/images/testimonial/2.jpg') }}" alt="2.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Simone Andreea</h4>
                                    I have constantly believed Be aHand to take care of their patain <a href="#">more...</a>
                                    <strong><a href="#"> 20 Jan 2017 </a></strong>
                                </div>
                            </div>
                        </div>
                        <div class="ulockd-latest-post">
                            <div class="media">
                                <div class="media-left pull-left">
                                    <a href="#">
                                        <img class="media-object thumbnail" src="{{ asset('front/images/testimonial/3.jpg') }}" alt="3.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Devid Andreea</h4>
                                    I have constantly believed Mr Fix to take care of busines <a href="#">more...</a>
                                    <strong><a href="#"> 20 Jan 2017 </a></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-ip-tag">
                        <div class="ulockd-tag-list-title">
                            <h3 class="ulockd-bb-dashed"><span class="flaticon-mark text-thm1"></span> Tags List </h3>
                        </div>
                        <ul class="list-inline ulockd-tag-list-details">
                            <li><a href="#">Photoshop</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">Corses</a></li>
                            <li><a href="#">Primum</a></li>
                            <li><a href="#">Designtuto</a></li>
                            <li><a href="#">Autocad</a></li>
                            <li><a href="#">Development</a></li>
                        </ul>
                    </div>
                <div class="ulockd-ip-flickr">
                    <div class="ulockd-flickr-list-title">
                        <h3 class="ulockd-bb-dashed"><span class="flaticon-flickr text-thm1"></span> Flickr Feed</h3>
                        <div class="flickr-photo"></div>
                    </div>
                </div>
                <div class="ulockd-ip-flickr">
                    <div class="ulockd-flickr-list-title">
                        <h3 class="ulockd-bb-dashed"><span class="flaticon-instagram text-thm1"></span> Instagram Feed</h3>
                        <div id="instagram-feed1"></div>
                    </div>
                </div>
                </div>
                -->
            </div>
        </div>
    </section>
@endsection
