@extends('front.layouts.master')

@section('title', 'Home')

@section('content')
	<!-- Home Design start -->
    @if(count($sliders) > 0)
        @include('front.partials.home-slider')
    @endif
	<!-- Home Design end -->

	<!-- Our Features start -->
    @if(count($features) > 0)
        @include('front.partials.home-feature')
    @endif
	<!-- Our Features end -->

	<!-- Our Causes -->
    @if(count($causes) > 0)
{{--        @include('front.partials.home-causes')--}}
        @include('front.partials.home-causes-2')
    @endif

	<!-- Our Recent CAUSES -->
    @if(count($recentCauses) > 0)
        @include('front.partials.home-recent-causes')
    @endif

	<!-- Our Why Choose -->
	@if($whyChooseUs)
        @include('front.partials.home-why-choose')
    @endif

	<!-- Our About -->
    @if($aboutUs)
        @include('front.partials.home-about-us')
    @endif

	<!-- Our Gallery -->
    @if($gallery && $galleryCategories)
        @include('front.partials.home-gallery')
    @endif

	<!-- Our Service -->
    @if($missionTitle && count($missions) > 0)
        @include('front.partials.home-services')
    @endif

	<!-- Our Project -->
	<section class="our-projects">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="ulockd-main-title">
						<h2 class="text-uppercase">Our <span class="text-thm2">Project</span></h2>
						<h4>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="project-box">
					<div class="col-sm-4 col-md-2 pb-thumb ulockd-pad395">
						<img class="img-responsive img-whp" src="{{ asset('front/images/project/1a.jpg') }}" alt="1a.jpg') }}">
						<div class="donate-button"><a href="#" class="btn ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</a></div>
					</div>
					<div class="col-sm-8 col-md-4 pb-details">
						<h3>Clean Water</h3>
						<p>Consectetur adipisicing elit</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore modi repellendus aspernatur necessitatibus quidem nostrum, iure illum perferendis.</p>
						<a href="#" class="">More Details <span class="flaticon-right-arrow"></span></a>
					</div>
				</div>
				<div class="project-box">
					<div class="col-sm-4 col-md-2 pb-thumb ulockd-pad395">
						<img class="img-responsive img-whp" src="{{ asset('front/images/project/2a.jpg') }}" alt="2a.jpg') }}">
						<div class="donate-button"><a href="#" class="btn ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</a></div>
					</div>
					<div class="col-sm-8 col-md-4 pb-details">
						<h3>Education For Child</h3>
						<p>Consectetur adipisicing elit</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore modi repellendus aspernatur necessitatibus quidem nostrum, iure illum perferendis.</p>
						<a href="#" class="">More Details <span class="flaticon-right-arrow"></span></a>
					</div>
				</div>
			</div>
			<div class="row ulockd-mrgn1225">
				<div class="project-box">
					<div class="col-sm-4 col-md-2 pb-thumb ulockd-pad395">
						<img class="img-responsive img-whp" src="{{ asset('front/images/project/3a.jpg') }}" alt="3a.jpg') }}">
						<div class="donate-button"><a href="#" class="btn ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</a></div>
					</div>
					<div class="col-sm-8 col-md-4 pb-details">
						<h3>Health For All</h3>
						<p>Consectetur adipisicing elit</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore modi repellendus aspernatur necessitatibus quidem nostrum, iure illum perferendis.</p>
						<a href="#" class="">More Details <span class="flaticon-right-arrow"></span></a>
					</div>
				</div>
				<div class="project-box">
					<div class="col-sm-4 col-md-2 pb-thumb ulockd-pad395">
						<img class="img-responsive img-whp" src="{{ asset('front/images/project/4a.jpg') }}" alt="4a.jpg') }}">
						<div class="donate-button"><a href="#" class="btn ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</a></div>
					</div>
					<div class="col-sm-8 col-md-4 pb-details">
						<h3>Refugee Save</h3>
						<p>Consectetur adipisicing elit</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore modi repellendus aspernatur necessitatibus quidem nostrum, iure illum perferendis.</p>
						<a href="#" class="">More Details <span class="flaticon-right-arrow"></span></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our First Divider -->
	<section class="divider ulockd-bgthm">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-12 text-center">
					<div class="subscriber-form subscribe">
						<h1 class="color-white">Don’t miss out on the Latest News</h1>
			            <h3>We won’t spam you and we respect your privacy.</h3>
			            <input placeholder="Your Email">
			            <button>SUBSCRIBE</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Team -->
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
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="ulockd-team-member">
						<div class="team-thumb">
							<img class="img-responsive img-whp" src="{{ asset('front/images/team/1.jpg') }}" alt="team1.jpg') }}">
							<div class="team-overlay">
								<ul class="list-inline team-icon style2">
		  							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
		  							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		  							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		  							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
		  						</ul>
							</div>
						</div>
						<div class="team-details text-left">
							<h3 class="member-name">John Smith</h3>
							<h5 class="member-post">- Volunteer</h5>
							<p>Lorem ipsum dolor sit amet, esse consectetur adipisicing elit.</p>
							<button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="ulockd-team-member">
						<div class="team-thumb">
							<img class="img-responsive img-whp" src="{{ asset('front/images/team/2.jpg') }}" alt="2.jpg') }}">
							<div class="team-overlay">
								<ul class="list-inline team-icon style2">
		  							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
		  							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		  							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		  							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
		  						</ul>
							</div>
						</div>
						<div class="team-details text-left">
							<h3 class="member-name">Ana Smith</h3>
							<h5 class="member-post">- Volunteer</h5>
							<p>Lorem ipsum dolor sit amet, esse consectetur adipisicing elit.</p>
							<button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="ulockd-team-member">
						<div class="team-thumb">
							<img class="img-responsive img-whp" src="{{ asset('front/images/team/3.jpg') }}" alt="3.jpg') }}">
							<div class="team-overlay">
								<ul class="list-inline team-icon style2">
		  							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
		  							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		  							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		  							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
		  						</ul>
							</div>
						</div>
						<div class="team-details text-left">
							<h3 class="member-name">Jhon Smith</h3>
							<h5 class="member-post">- Volunteer</h5>
							<p>Lorem ipsum dolor sit amet, esse consectetur adipisicing elit.</p>
							<button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="ulockd-team-member">
						<div class="team-thumb">
							<img class="img-responsive img-whp" src="{{ asset('front/images/team/6.jpg') }}" alt="4.jpg') }}">
							<div class="team-overlay">
								<ul class="list-inline team-icon style2">
		  							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
		  							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		  							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		  							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
		  						</ul>
							</div>
						</div>
						<div class="team-details text-left">
							<h3 class="member-name">Jhon Smith</h3>
							<h5 class="member-post">- Volunteer</h5>
							<p>Lorem ipsum dolor sit amet, esse consectetur adipisicing elit.</p>
							<button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our First Divider -->
	<section class="ulockd-frst-divider style1 parallax" data-stellar-background-ratio="0.3">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h2 class="color-white">Be aHand Proud to Say, After Providing The Best Non-Profit Support.</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-3 text-center">
					<div class="ulockd-ffact-one">
						<span class="flaticon-people-12 text-thm2"></span>
                        <p>Total Volunteers</p>
                        <div class="timer">455860</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 text-center">
					<div class="ulockd-ffact-one">
						<span class="flaticon-medal text-thm2"></span>
                        <p>Total Award</p>
                        <div classs="timer">2052</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 text-center">
					<div class="ulockd-ffact-one">
						<span class="flaticon-interface text-thm2"></span>
                        <p>Successful Projects</p>
                        <div class="timer">22780</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 text-center">
					<div class="ulockd-ffact-one">
						<span class="flaticon-donation text-thm2"></span>
                        <p>Total Amount Raised</p>
                        <div class="timer">1707400</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Testimonials -->
	<section class="ulockd-testimonial">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="ulockd-main-title">
						<h2 class="text-uppercase">Our <span class="text-thm2">Testimonials</span></h2>
						<h4>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="ulockd-testimonials">
						<div class="testi-thumb pull-left"><img class="img-responsive img-whp thumbnail" src="{{ asset('front/images/testimonial/1.jpg') }}" alt="1.jpg') }}"></div>
						<div class="testi-details">
							<h4>Daniel Forg</h4>
							<p class="text-thm2">-Oxford Professor</p>
							<p>Consectetur adipisicing elit. Maiores a molestias, exercitationem at? Neque eaque modi minus consequuntur sapiente quasi amet? Animi.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="ulockd-testimonials">
						<div class="testi-thumb pull-left"><img class="img-responsive img-whp thumbnail" src="{{ asset('front/images/testimonial/2.jpg') }}" alt="2.jpg') }}"></div>
						<div class="testi-details">
							<h4>Daniel Forg</h4>
							<p class="text-thm2">-Oxford Professor</p>
							<p>Consectetur adipisicing elit. Maiores a molestias, exercitationem at? Neque eaque modi minus consequuntur sapiente quasi amet? Animi.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="ulockd-testimonials">
						<div class="testi-thumb pull-left"><img class="img-responsive img-whp thumbnail" src="{{ asset('front/images/testimonial/3.jpg') }}" alt="3.jpg') }}"></div>
						<div class="testi-details">
							<h4>Daniel Forg</h4>
							<p class="text-thm2">-Oxford Professor</p>
							<p>Consectetur adipisicing elit. Maiores a molestias, exercitationem at? Neque eaque modi minus consequuntur sapiente quasi amet? Animi.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Blog -->
    {{--
	<section class="ulockd-blog">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="ulockd-main-title">
						<h2 class="text-uppercase">LATEST <span class="text-thm2">NEWS</span></h2>
						<h4>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<article class="ulockd-blog-post ulockd-mrgn630">
						<div class="post-thumb">
							<div class="img-post-icon ulockd-bgthm"><span class="fa fa-image"></span></div>
							<img class="img-responsive img-whp" src="{{ asset('front/images/blog/1.jpg') }}" alt="1.jpg') }}">
							<ul class="list-inline posted-date">
								<li><a class="text-thm2" href="#"><span class="flaticon-people-2"></span> Diade3007</a></li>
								<li><a class="text-thm2" href="#"><span class="flaticon-chat text-thm2"></span> 9 Comment</a></li>
							</ul>
						</div>
						<div class="bp-details one text-left">
							<div class="bp-date pull-left">
								<span class="day">26</span> <br>
								<span class="time">Sep 17</span>
							</div>
							<h3 class="post-title">Our Latest Post</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus consequatur hic, harum aliquid aperiam fuga beatae laudantium velit, laborum minus omnis itaque nostrum, nisi quod!</p>
							<button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
						</div>
					</article>
				</div>
				<div class="col-sm-6 col-md-4">
					<article class="ulockd-blog-post">
						<div class="bp-details one text-left">
							<div class="bp-date pull-left">
								<span class="day">26</span> <br>
								<span class="time">Sep 17</span>
							</div>
							<h3 class="post-title">Our Latest Post</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus consequatur hic, harum aliquid aperiam fuga beatae laudantium velit, laborum minus omnis itaque nostrum, nisi quod!</p>
							<button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
						</div>
						<div class="post-thumb">
							<div class="img-post-icon ulockd-bgthm"><span class="fa fa-image"></span></div>
							<img class="img-responsive img-whp" src="{{ asset('front/images/blog/2.jpg') }}" alt="2.jpg') }}">
							<ul class="list-inline posted-date">
								<li><a class="text-thm2" href="#"><span class="flaticon-people-2"></span> Diade3007</a></li>
								<li><a class="text-thm2" href="#"><span class="flaticon-chat text-thm2"></span> 9 Comment</a></li>
							</ul>
						</div>
					</article>
				</div>
				<div class="col-sm-6 col-md-4">
					<article class="ulockd-blog-post ulockd-mrgn630">
						<div class="post-thumb">
							<div class="img-post-icon ulockd-bgthm"><span class="fa fa-image"></span></div>
							<img class="img-responsive img-whp" src="{{ asset('front/images/blog/3.jpg') }}" alt="3.jpg') }}">
							<ul class="list-inline posted-date">
								<li><a class="text-thm2" href="#"><span class="flaticon-people-2"></span> Diade3007</a></li>
								<li><a class="text-thm2" href="#"><span class="flaticon-chat text-thm2"></span> 9 Comment</a></li>
							</ul>
						</div>
						<div class="bp-details one text-left">
							<div class="bp-date pull-left">
								<span class="day">26</span> <br>
								<span class="time">Sep 17</span>
							</div>
							<h3 class="post-title">Our Latest Post</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus consequatur hic, harum aliquid aperiam fuga beatae laudantium velit, laborum minus omnis itaque nostrum, nisi quod!</p>
							<button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>
    --}}

	<!-- Our Partner -->
    {{--
	<section class="ulockd-partner">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-partner-thumb text-center"><img src="{{ asset('front/images/partners/partner1.png') }}" alt="partner1.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-partner-thumb text-center"><img src="{{ asset('front/images/partners/partner2.png') }}" alt="partner2.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-partner-thumb text-center"><img src="{{ asset('front/images/partners/partner3.png') }}" alt="partner3.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-partner-thumb text-center"><img src="{{ asset('front/images/partners/partner4.png') }}" alt="partner4.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-partner-thumb text-center"><img src="{{ asset('front/images/partners/partner5.png') }}" alt="partner5.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-partner-thumb text-center"><img src="{{ asset('front/images/partners/partner6.png') }}" alt="partner6.png"></div></div>
			</div>
		</div>
	</section>
    --}}
@endsection
