<section class="ulockd-service-two">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="ulockd-main-title">
                    {!! $missionTitle->description ?? '' !!}
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($missions as $mission)
                <div class="col-xs-12 col-sm-6 col-md-4 clearfix">
                    <div class="ulockd-mssn-col ulockd-mrgn650">
                        {{--                    <div class="missn-icon"><span class="flaticon-rice"></span></div>--}}
                        <div class="missn-details">
                            {!! $mission->description ?? '' !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
