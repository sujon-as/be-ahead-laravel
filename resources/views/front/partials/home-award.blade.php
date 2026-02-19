<section class="ulockd-frst-divider style1 parallax" data-stellar-background-ratio="0.3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="color-white">{{ $awardTitle->description ?? '' }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($awards as $award)
                <div class="col-sm-6 col-md-3 text-center">
                    <div class="ulockd-ffact-one">
{{--                        <span class="flaticon-people-12 text-thm2"></span>--}}
                        <p>{{ $award->title }}</p>
                        <div class="timer">{{ $award->count }}</div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
