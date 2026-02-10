<div class="ulockd-home-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ulockd-pmz">
                <div class="cd-hero">
                    <ul class="cd-hero-slider autoplay">
                        @foreach($sliders as $key => $slider)
                            <li class="{{ $key === 0 ? 'selected' : '' }}" style="background-image: url({{ ($slider && $slider->bg_img) ? asset($slider->bg_img) : asset('front/images/home/h1.jpg') }});">
                                <div class="cd-full-width">
                                    <h1>{{ ($slider && $slider->title_1) ? $slider->title_1 : 'Be aHand' }}</h1>
                                    <h2>{{ ($slider && $slider->title_2) ? $slider->title_2 : 'Be aHand' }}</h2>
                                    <h4>{{ ($slider && $slider->title_3) ? $slider->title_3 : 'Be aHand' }}</h4>
                                    <a href="{{ route('about') }}" class="cd-btn btn btn-default ulockd-btn-thm2">About Us</a>
                                    <a href="{{ route('contact') }}" class="cd-btn btn btn-default ulockd-btn-styledark">Contact Us</a>
                                </div> <!-- .cd-full-width -->
                            </li>
                        @endforeach
                    </ul> <!-- .cd-hero-slider -->

                    <div class="cd-slider-nav">
                        <nav>
                            <span class="cd-marker item-1"></span>
                            <ul>
                                @foreach($sliders as $slider)
                                    <li><a href="#" style="background-image: url({{ ($slider && $slider->marker_img) ? asset($slider->marker_img) : asset('front/images/home/h1a.jpg') }});"></a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div> <!-- .cd-slider-nav -->
                </div>
            </div>
        </div>
    </div>
</div>
