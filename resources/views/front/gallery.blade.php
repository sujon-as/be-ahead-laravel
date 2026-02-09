@extends('front.layouts.master')

@section('title', 'Gallery')

@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-header">
                        <h2>Gallery</h2>
                        <ul class="list-inline ulockd-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Gallery -->
    <section class="ulockd-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="ulockd-main-title">
                        <h2 class="text-uppercase">Our Photo <span class="text-thm2">Gallery</span></h2>
                        <h4>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Masonry Filter -->
                    <ul class="list-inline masonry-filter text-center">
                        <li><a href="#" class="active" data-filter="*">All</a></li>
                        <li><a href="#" data-filter=".charity" class="">Charity</a></li>
                        <li><a href="#" data-filter=".children" class="">Children</a></li>
                        <li><a href="#" data-filter=".education" class="">Education</a></li>
                        <li><a href="#" data-filter=".fundraisin" class="">Fundraising</a></li>
                        <li><a href="#" data-filter=".clothing" class="">Clothing</a></li>
                    </ul>
                    <!-- End Masonry Filter -->

                    <!-- Masonry Grid -->
                    <div id="grid" class="masonry-gallery grid-three-item clearfix" style="position: relative; height: 759.9px;">

                        <!-- Masonry Item -->
                        <div class="isotope-item charity children" style="position: absolute; left: 0px; top: 0px;">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/1.jpg') }}" alt="project">
                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>Gallery Title Here</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset('front/images/gallery/1.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
                                                </li>
                                                <li>
                                                    <a class="link-btn" href="#"><span class="flaticon-link-symbol"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Masonry Item -->
                        <div class="isotope-item children education clothing" style="position: absolute; left: 390px; top: 0px;">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/2.jpg') }}" alt="project">
                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>Gallery Title Here</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset('front/images/gallery/2.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
                                                </li>
                                                <li>
                                                    <a class="link-btn" href="#"><span class="flaticon-link-symbol"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Masonry Item -->
                        <div class="isotope-item new children clothing" style="position: absolute; left: 780px; top: 0px;">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/3.jpg') }}" alt="project">
                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>Gallery Title Here</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset('front/images/gallery/3.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
                                                </li>
                                                <li>
                                                    <a class="link-btn" href="#"><span class="flaticon-link-symbol"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Masonry Item -->
                        <div class="isotope-item charity" style="position: absolute; left: 0px; top: 253px;">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/4.jpg') }}" alt="project">
                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>Gallery Title Here</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset('front/images/gallery/4.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
                                                </li>
                                                <li>
                                                    <a class="link-btn" href="#"><span class="flaticon-link-symbol"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Masonry Item -->
                        <div class="isotope-item children clothing" style="position: absolute; left: 390px; top: 253px;">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/5.jpg') }}" alt="project">
                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>Gallery Title Here</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset('front/images/gallery/5.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
                                                </li>
                                                <li>
                                                    <a class="link-btn" href="#"><span class="flaticon-link-symbol"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Masonry Item -->
                        <div class="isotope-item new education fundraisin" style="position: absolute; left: 780px; top: 253px;">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/6.jpg') }}" alt="project">
                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>Gallery Title Here</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset('front/images/gallery/6.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
                                                </li>
                                                <li>
                                                    <a class="link-btn" href="#"><span class="flaticon-link-symbol"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Masonry Item -->
                        <div class="isotope-item fundraisin" style="position: absolute; left: 0px; top: 506px;">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/7.jpg') }}" alt="project">
                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>Gallery Title Here</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset('front/images/gallery/7.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
                                                </li>
                                                <li>
                                                    <a class="link-btn" href="#"><span class="flaticon-link-symbol"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Masonry Item -->
                        <div class="isotope-item charity" style="position: absolute; left: 390px; top: 506px;">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/8.jpg') }}" alt="project">
                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>Gallery Title Here</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset('front/images/gallery/8.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
                                                </li>
                                                <li>
                                                    <a class="link-btn" href="#"><span class="flaticon-link-symbol"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Masonry Item -->
                        <div class="isotope-item charity children" style="position: absolute; left: 780px; top: 506px;">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/1.jpg') }}" alt="project">
                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>Gallery Title Here</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset('front/images/gallery/1.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
                                                </li>
                                                <li>
                                                    <a class="link-btn" href="#"><span class="flaticon-link-symbol"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Masonry Gallery Grid Item -->
                </div>
            </div>
        </div>
    </section>
@endsection
