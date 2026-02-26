@extends('front.layouts.master')

@section('title', 'Blog')

@section('content')
    <!-- Home Design Inner Pages -->
    <div class="ulockd-inner-home">
        <div class="container text-center">
            <div class="row">
                <div class="ulockd-inner-conraimer-details">
                    <div class="col-md-12">
                        <h1 class="text-uppercase">Blog</h1>
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
                            <li> <a href="{{ route('blog') }}"> Blog </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our About Page news Section -->
    <section class="ulockd-ip-latest-news">
        <div class="container">
            @if(count($blogs) > 0)
                @foreach($blogs->chunk(3) as $chunk)
                    <div class="row ulockd-mrgn1225">
                        @foreach($chunk as $blog)
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <article class="ulockd-blog-post ulockd-mrgn630">
                                    <div class="post-thumb">
                                        <div class="img-post-icon ulockd-bgthm"><span class="fa fa-image"></span></div>
                                        <img class="img-responsive img-whp" src="{{ asset($blog->img ?? '') }}" alt="1.jpg" loading="lazy">
{{--                                        <ul class="list-inline posted-date">--}}
{{--                                            <li><a class="text-thm2" href="#"><span class="flaticon-people-2"></span> Diade3007</a></li>--}}
{{--                                            <li><a class="text-thm2" href="#"><span class="flaticon-chat text-thm2"></span> 9 Comment</a></li>--}}
{{--                                        </ul>--}}
                                    </div>
                                    <div class="bp-details one text-left">
                                        <h3 class="post-title">{{ $blog->title ?? '' }}</h3>
                                        <p>{{ $blog->short_content ?? '' }}</p>
                                        @if(strlen($blog->plain_content) > 100)
                                            <a href="{{ route('blog.details', $blog->id) }}">
                                                <button type="button" class="btn btn-default ulockd-btn-thm2">Read More</button>
                                            </a>
                                        @endif
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                @endforeach


            @endif
        </div>
    </section>
@endsection
