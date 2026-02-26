<section class="ulockd-service-two">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="ulockd-main-title">
                    {!! $missionTitle->description ?? '' !!}
                </div>
            </div>
        </div>
        @foreach($missions->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $mission)
                    <div class="col-xs-12 col-sm-6 col-md-4 clearfix">
                        <div class="ulockd-mssn-col ulockd-mrgn650">
                            {{--                    <div class="missn-icon"><span class="flaticon-rice"></span></div>--}}
                            <div class="missn-details">
{{--                                {!! $mission->description ?? '' !!}--}}
                                <h3>{{ $mission->title ?? ''  }}</h3>
                                <p>{{ $mission->short_content ?? '' }}</p>
{{--                                {{ $project }}--}}
                                @if(strlen($mission->plain_content) > 100)
                                    <a href="{{ route('mission.details', $mission->id) }}" class="read-more" style="color: green !important;">Read more</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>
