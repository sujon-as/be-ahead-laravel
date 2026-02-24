<section class="ulockd-about2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7">
                <div class="ulock-about">
                    {!! $aboutUs->title !!}
                    {!! $aboutUs->description !!}
                    <a href="{{ route('about') }}">
                        <button type="button" class="btn btn-default ulockd-btn-thm2">Read More</button>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="ulockd-about-box ulockd-mrgn1260">
                    <div class="ab-thumb">
                        <img class="img-responsive img-whp" src="{{ asset($aboutUs->img) }}" alt="about us" loading="lazy">
                    </div>
                    <p class="text-center ulockd-mrgn1210">{{ $aboutUs->img_short_text }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
