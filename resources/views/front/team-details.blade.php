@extends('front.layouts.master')

@section('title', 'Team Details')

@section('content')

    <section class="ulockd-service-details">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="service-details-content">

                        <!-- Image -->
                        <div class="thumb">
                            <img class="img-responsive"
                                 src="{{ asset($cause->img) }}"
                                 loading="lazy"
                                 alt="{{ $cause->name ?? '' }}">
                        </div>

                        <!-- Title -->
                        <h2 class="ulockd-mrgn120">
                            {{ $cause->name ?? 'Mission Details' }}
                        </h2>
                        <h5 class="member-post">- {{ $cause->designation ?? '' }}</h5>

                        <!-- Progress Bar -->
                        <!--
                        <div class="progress-levels ulockd-mrgn1210">
                            <div class="progress-box">
                                <div class="inner">
                                    <div class="bar">
                                        <div class="bar-innner">
                                            <div class="bar-fill ulockd-bgthm"
                                                 data-percent="{{ $cause->percentage }}">
                                                <div class="percent">
                                                    {{ $cause->percentage }}%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->

                        <!-- Full Content -->
                        <div class="details-content ulockd-mrgn1210">
                            {!! $cause->description !!}
                        </div>

                        <!-- Donate Button -->
{{--                        <div class="ulockd-mrgn1210">--}}
{{--                            <a href="{{ route('donation') }}"--}}
{{--                               class="btn btn-lg btn-default ulockd-btn-thm2">--}}
{{--                                Donate Now--}}
{{--                            </a>--}}
{{--                        </div>--}}

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
