@extends('front.layouts.master')

@section('title', 'Causes')

@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-header">
                        <h2>Causes</h2>
                        <ul class="list-inline ulockd-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Causes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Causes -->
    <section class="ulockd-causes">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="ulockd-project-sm-thumb">
                        <img class="img-responsive img-whp" src="{{ asset('front/images/causes/1.jpg') }}" alt="">
                        <div class="ulockd-bp-fig-caption">
                            <div class="ulockd-bp-middle">
                                <div class="ulockd-bp-icon"><span class="flaticon-link-symbol"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-project-sm-details">
                        <h3>Charity for Food</h3>
                        <p class="color-black33">Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</p>
                        <div class="progress-levels ulockd-mrgn1210">
                            <div class="progress-box wow" data-wow-delay="100ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 100ms; animation-name: slideInLeft;">
                                <div class="inner">
                                    <div class="bar">
                                        <div class="bar-innner">
                                            <div class="bar-fill ulockd-bgthm" data-percent="80" style="width: 80%;"><div class="percent"></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline">
                            <li><strong>Raised:</strong> $45000</li>
                            <li><strong>Goal:</strong> <span class="text-thm2">$70000</span></li>
                        </ul>
                        <p>Charity, institutional and modern clothing offices clean extensive amounts of textures in an extensive.</p>
                        <ul class="list-inline">
                            <li><button type="submit" class="btn btn-default ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</button></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="ulockd-project-sm-thumb">
                        <img class="img-responsive img-whp" src="{{ asset('front/images/causes/2.jpg') }}" alt="">
                        <div class="ulockd-bp-fig-caption">
                            <div class="ulockd-bp-middle">
                                <div class="ulockd-bp-icon"><span class="flaticon-link-symbol"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-project-sm-details">
                        <h3>Charity for Health</h3>
                        <p class="color-black33">Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</p>
                        <div class="progress-levels ulockd-mrgn1210">
                            <div class="progress-box wow" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: slideInLeft;">
                                <div class="inner">
                                    <div class="bar">
                                        <div class="bar-innner">
                                            <div class="bar-fill ulockd-bgthm" data-percent="75" style="width: 75%;"><div class="percent"></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline">
                            <li><strong>Raised:</strong> $37000</li>
                            <li><strong>Goal:</strong> <span class="text-thm2">$45000</span></li>
                        </ul>
                        <p>Charity, institutional and modern clothing offices clean extensive amounts of textures in an extensive.</p>
                        <ul class="list-inline">
                            <li><button type="submit" class="btn btn-default ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</button></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="ulockd-project-sm-thumb">
                        <img class="img-responsive img-whp" src="{{ asset('front/images/causes/3.jpg') }}" alt="">
                        <div class="ulockd-bp-fig-caption">
                            <div class="ulockd-bp-middle">
                                <div class="ulockd-bp-icon"><span class="flaticon-link-symbol"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-project-sm-details">
                        <h3>Charity for Education</h3>
                        <p class="color-black33">Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</p>
                        <div class="progress-levels ulockd-mrgn1210">
                            <div class="progress-box wow" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: slideInLeft;">
                                <div class="inner">
                                    <div class="bar">
                                        <div class="bar-innner">
                                            <div class="bar-fill ulockd-bgthm" data-percent="95" style="width: 95%;"><div class="percent"></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline">
                            <li><strong>Raised:</strong> $22000</li>
                            <li><strong>Goal:</strong> <span class="text-thm2">$25000</span></li>
                        </ul>
                        <p>Charity, institutional and modern clothing offices clean extensive amounts of textures in an extensive.</p>
                        <ul class="list-inline">
                            <li><button type="submit" class="btn btn-default ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
