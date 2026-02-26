<section class="ulockd-frst-divider style1 parallax" data-stellar-background-ratio="0.3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="color-white">{{ $vision->title ?? '' }}</h2>
                <p class="color-white">{{ $vision->short_content }}</p>
                @if(strlen($vision->plain_content) > 100)
                    <a href="{{ route('vision.details') }}" class="read-more" style="color: green !important;">Read more</a>
                @endif
            </div>
        </div>
    </div>
</section>
