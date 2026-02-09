@extends('front.layouts.master')

@section('title', 'Events')

@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-header">
                        <h2>Events</h2>
                        <ul class="list-inline ulockd-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Events</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Events -->
    <section class="ulockd-events">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="ulockd-event-sm-thumb">
                        <img class="img-responsive img-whp" src="{{ asset('front/images/event/1.jpg') }}" alt="">
                        <div class="ulockd-bp-fig-caption">
                            <div class="ulockd-bp-middle">
                                <div class="ulockd-bp-icon"><span class="flaticon-link-symbol"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-event-sm-details">
                        <h3>Charity for Food</h3>
                        <p>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-calendar"></i> 21 Jan, 2017</a></li>
                            <li><a href="#"><i class="fa fa-clock-o"></i> 10:00 - 2:00</a></li>
                        </ul>
                        <p>Charity, institutional and modern clothing offices clean extensive amounts of textures in an extensive.</p>
                        <ul class="list-inline">
                            <li><a class="btn btn-default ulockd-btn-thm2" href="#">Read More</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="ulockd-event-sm-thumb">
                        <img class="img-responsive img-whp" src="{{ asset('front/images/event/2.jpg') }}" alt="">
                        <div class="ulockd-bp-fig-caption">
                            <div class="ulockd-bp-middle">
                                <div class="ulockd-bp-icon"><span class="flaticon-link-symbol"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-event-sm-details">
                        <h3>Charity for Health</h3>
                        <p>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-calendar"></i> 21 Jan, 2017</a></li>
                            <li><a href="#"><i class="fa fa-clock-o"></i> 10:00 - 2:00</a></li>
                        </ul>
                        <p>Charity, institutional and modern clothing offices clean extensive amounts of textures in an extensive.</p>
                        <ul class="list-inline">
                            <li><a class="btn btn-default ulockd-btn-thm2" href="#">Read More</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="ulockd-event-sm-thumb">
                        <img class="img-responsive img-whp" src="{{ asset('front/images/event/3.jpg') }}" alt="">
                        <div class="ulockd-bp-fig-caption">
                            <div class="ulockd-bp-middle">
                                <div class="ulockd-bp-icon"><span class="flaticon-link-symbol"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-event-sm-details">
                        <h3>Charity for Education</h3>
                        <p>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-calendar"></i> 21 Jan, 2017</a></li>
                            <li><a href="#"><i class="fa fa-clock-o"></i> 10:00 - 2:00</a></li>
                        </ul>
                        <p>Charity, institutional and modern clothing offices clean extensive amounts of textures in an extensive.</p>
                        <ul class="list-inline">
                            <li><a class="btn btn-default ulockd-btn-thm2" href="#">Read More</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
