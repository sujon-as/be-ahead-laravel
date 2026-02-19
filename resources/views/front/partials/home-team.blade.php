<section class="ulockd-team">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="ulockd-main-title">
                    <h2 class="text-uppercase">OUR <span class="text-thm2">VOLUNTEERS</span></h2>
                    <h4>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($volunteers as $volunteer)
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="ulockd-team-member">
                        <div class="team-thumb">
                            <img class="img-responsive img-whp" src="{{ asset($volunteer->image) }}" alt="{{ $volunteer->f_name }}">
{{--                            <div class="team-overlay">--}}
{{--                                <ul class="list-inline team-icon style2">--}}
{{--                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </div>
                        <div class="team-details text-left">
                            <h3 class="member-name">{{ $volunteer->f_name }} {{ $volunteer->l_name }}</h3>
                            <h5 class="member-post">- Volunteer</h5>
                            <p>Lorem ipsum dolor sit amet, esse consectetur adipisicing elit.</p>
{{--                            <button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>--}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
