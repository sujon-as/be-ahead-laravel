<section class="recent-causes">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="ulockd-main-title">
                    {!! $recentCauseTitles->title_1 !!}
                    {!! $recentCauseTitles->title_2 !!}
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($recentCauses as $key => $recentCause)
                <div class="col-sm-6 col-md-6 col-lg-3 fservice-box">
                    <div class="db-thumb">
                        <img class="img-responsive img-whp" src="{{ asset($recentCause->img) }}" alt="recent-causes">
                        <div class="db-overlayer"></div>
                    </div>
                    <div class="db-details text-left">
                        <div id="bar1" class="barfiller ulockd-mrgn1225">
                            <div class="tipWrap" style="display: inline;">
                                <span class="tip" style="left: 148.65px; transition: left 1s ease-in-out;">{{ $recentCause->percentage }}%</span>
                            </div>
                            <span class="fill ulockd-bgthm" data-percentage="{{ $recentCause->percentage }}" style="background: rgb(22, 181, 151); width: {{ (260 * $recentCause->percentage) / 100 }}px; transition: width 1s ease-in-out;"></span>
                        </div>
                        {!! $recentCause->content !!}
                        <a
                            href="{{ route('donation') }}"
                            type="button"
                            class="btn btn-default ulockd-btn-thm2"
                            data-toggle="modal"
                            data-target=".bs-example-modal-default">
                            Donate now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
