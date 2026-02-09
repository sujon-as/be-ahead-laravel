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
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="ulock-about">
                        <h2 class="title-bottom ulockd-mrgn630">About Be<span class="text-thm2"> aHand</span></h2>
                        <p>Be aHand Is a Most Charity/ Non-profit/ Fundraising/ NGO organizations. Now Be aHand Is a Biggest organizations In This Globe. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo repudiandae sunt delectus praesentium adipisci voluptatem sed, consectetur! Optio quis alias necessitatibus quidem dolore est nobis iusto, doloremque, velit vel, eligendi excepturi iure quas dignissimos eius.</p>
                        <p>Consectetur adipisicing elit. Assumenda in, animi facere illum culpa autem minima nostrum doloribus dignissimos!</p>
                        <h4>History Of Be aHand</h4>
                        <p>Be aHand Start Their Work With Small organizations In The Year 1990.Now Be aHand is world wide organizations. There Consectetur adipisicing elit. Nemo repudiandae sunt delectus praesentium adipisci voluptatem sed, consectetur! Optio quis alias necessitatibus quidem.</p>
                        <button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5">
                    <div class="ulockd-about-box ulockd-mrgn1260">
                        <div class="ab-thumb">
                            <img class="img-responsive img-whp" src="{{ asset('front/images/about/1.jpg') }}" alt="1.jpg">
                        </div>
                        <p class="text-center ulockd-mrgn1210">Be aHand Start Their Work With Small organizations In The Year 1990.Now Be aHand is world wide organizations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
