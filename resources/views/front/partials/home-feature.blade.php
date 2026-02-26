<section class="service1 ulockd-bgthm">
    <div class="container-fluid text-center">
        <div class="row">
            @foreach($features as $key => $feature)
                <div class="col-sm-6 col-md-3 ulockd-pad395">
                    <figure class="fclmn-one" style="--hover-url: url({{ $feature->bg_img ? asset($feature->bg_img) : asset('front/images/fclumn/1.jpg') }});">
                        <div class="caption">
    {{--                        <div class="fc-icon"><span class="flaticon-raise-your-hand-to-ask"></span></div>--}}
                            <h5>{{ $feature->title_1 ?? 'N/A' }}</h5>
                            <h3>{{ $feature->title_2 ?? 'N/A' }}</h3>
                            @if(($key + 1)  % 2 === 0)
                                <a href="{{ route('blog') }}" class="cd-btn btn btn btn-default ulockd-btn-styledark">Blog</a>
                            @else
                                <a href="{{ route('latest-news') }}" class="cd-btn btn btn-default ulockd-btn-styledark">Latest News</a>
                            @endif
{{--                            <a href="{{ route('about') }}" class="cd-btn btn btn-default ulockd-btn-thm2">About Us</a>--}}
{{--                            <a href="{{ route('donation') }}">--}}
{{--                                <button type="button" class="btn btn-default ulockd-btn-styledark">Donate now</button>--}}
{{--                            </a>--}}
                        </div>
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
</section>
