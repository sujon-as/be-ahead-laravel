@extends('front.layouts.master')

@section('title', 'Home')

@section('content')
	<!-- Home Design start -->
    @if(count($sliders) > 0)
        @include('front.partials.home-slider')
    @endif
	<!-- Home Design end -->

	<!-- Our Features start -->
    @if(count($features) > 0)
        @include('front.partials.home-feature')
    @endif
	<!-- Our Features end -->

	<!-- Our Causes -->
    @if(count($causes) > 0)
{{--        @include('front.partials.home-causes')--}}
        @include('front.partials.home-causes-2')
    @endif

	<!-- Our Recent CAUSES -->
    @if(count($recentCauses) > 0)
        @include('front.partials.home-recent-causes')
    @endif

	<!-- Our Why Choose -->
	@if($whyChooseUs)
        @include('front.partials.home-why-choose')
    @endif

	<!-- Our About -->
    @if($aboutUs)
        @include('front.partials.home-about-us')
    @endif

	<!-- Our Gallery -->
    @if($gallery && $galleryCategories)
        @include('front.partials.home-gallery')
    @endif

	<!-- Our Service -->
    @if($missionTitle && count($missions) > 0)
        @include('front.partials.home-services')
    @endif

	<!-- Our Project -->
    @if($projectTitle && count($projects) > 0)
        @include('front.partials.home-projects')
    @endif

	<!-- Our First Divider -->
{{--    @include('front.partials.home-newsletter')--}}

	<!-- Our Team -->
    @if($projectTitle && count($volunteers) > 0)
        @include('front.partials.home-team')
    @endif

	<!-- Our First Divider -->
    @if($awardTitle && count($awards) > 0)
        @include('front.partials.home-award')
    @endif

	<!-- Our Testimonials -->
{{--    @include('front.partials.home-testimonial')--}}

	<!-- Our Blog -->
{{--    @include('front.partials.home-blog')--}}

	<!-- Our Partner -->
{{--    @include('front.partials.home-partner')--}}
@endsection
