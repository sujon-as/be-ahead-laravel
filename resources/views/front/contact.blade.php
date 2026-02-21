@extends('front.layouts.master')

@section('title', 'Contact Us')

@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-header">
                        <h2>Contact Us</h2>
                        <ul class="list-inline ulockd-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Contact -->
    <section class="ulockd-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="ulockd-main-title">
                        <h2 class="text-uppercase">Get In <span class="text-thm2">Touch</span></h2>
                        <p>{{ $awardTitle->description ?? 'We are Charity/ Non-profit/ Fundraising/ NGO organizations.Help a child Without Family. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, distinctio.' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="ulockd-contact-info text-center">
                        <div class="ulockd-icon-box">
                            <span class="flaticon-map-marker"></span>
                        </div>
                        <h3>Our Location</h3>
                        <p>{{ ($settings && $settings->address) ? $settings->address : 'Victoria 8007 Australia Envato HQ 121 King Street, Melbourne.' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ulockd-contact-info text-center">
                        <div class="ulockd-icon-box"><span class="flaticon-old-handphone"></span></div>
                        <h3>Phone Number</h3>
                        <p>{{ ($settings && $settings->phone) ? $settings->phone : '+123456789' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ulockd-contact-info text-center">
                        <div class="ulockd-icon-box"><span class="flaticon-black-back-closed-envelope-shape"></span></div>
                        <h3>Email Address</h3>
                        <p>{{ ($settings && $settings->email) ? $settings->email : 'example@example.com' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('front.partials.contact-form')
            </div>
        </div>
    </section>
@endsection
