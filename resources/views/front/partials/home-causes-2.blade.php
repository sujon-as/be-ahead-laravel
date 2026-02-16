<section class="ulockd-causes">
    <div class="container">
        <div class="row">
            @if(count($causeTitles) > 0)
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="ulockd-main-title">
                        {!! $causeTitles[0]->title_1 !!}
                        {!! $causeTitles[0]->title_2 !!}
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="row">
                    @foreach($causes as $key => $cause)
                        <div class="col-sm-6 col-md-6 col-lg-3 fservice-box ulockd-pad395">
                            <div class="db-thumb">
                                <img class="img-responsive img-whp" src="{{ asset($cause->img) }}" alt="" loading="lazy">
                                <div class="db-overlayer"></div>
                            </div>
                            <div class="db-details text-left">
                                <div class="progress-levels ulockd-mrgn1210">
                                    <div class="progress-box wow" data-wow-delay="{{ ($key + 1) * 100 }}ms" data-wow-duration="1500ms">
                                        <div class="inner">
                                            <div class="bar">
                                                <div class="bar-innner">
                                                    <div class="bar-fill ulockd-bgthm" data-percent="{{ $cause->percentage }}"><div class="percent"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! $cause->content !!}
                                <ul class="list-inline">
                                    <li>
                                        <a
                                            href="{{ route('donation') }}"
                                            type="button"
                                            class="btn btn-default ulockd-btn-thm2">
                                            Donate now
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--
            <div class="col-sm-6 col-md-4 rs-smd-pad395">
                <figure class="upcoming-event">
                    <div class="caption">
                        <img class="img-responsive img-whp" src="{{ asset('front/images/event/1.jpg') }}" alt="1.jpg') }}">
                        <h5 class="event-stitle ulockd-bgthm">Our Next Event</h5>
                        <div class="event-details">
                            <div id="countdown"></div>
                            <h3 class="event-title">Sponsor a Child</h3>
                            <p>Consectetur adipisicing elit Ullam deserunt ut cumque</p>
                            <div class="event-date">On <span class="date">31 Dec, 17</span> at <span class="time"> 8:30 am</span></div>
                            <div class="event-location">121 King Street, Melbourne, AUS </div>
                        </div>
                        <div class="event-footer ulockd-bgthm">
                            <ul class="list-inline">
                                <li><a class="btn btn-default ulockd-btn-white" title="Event Registration">Register</a></li>
                                <li><a href="#" title="Contacat With Event Manager"><i class="fa fa-envelope-o"></i></a></li>
                                <li><a href="#" title="Get Event Direction"><i class="fa fa-compass"></i></a></li>
                                <li><a href="#" title="Share This Event"><i class="fa fa-share-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </figure>
            </div>
            -->
        </div>
    </div>
</section>
