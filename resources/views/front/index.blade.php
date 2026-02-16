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
	<section class="ulockd-divider1">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h5>We are Charity/ Non-profit/ Fundraising/ NGO organizations.Help a child Without Family.</h5>
					<h2 class="text-uppercase ulockd-mrgn640">Join With Us, Your Attention is changed the part of world.</h2>
					<p class=" ulockd-mrgn620">Cupiditate qui molestias fugit voluptatibus laudantium maxime voluptate corrupti ab repudiandae dolor repellendus? laudantium maxime voluptate corrupti ab repudiandae dolor repellendus?</p>
					<button type="submit" class="btn btn-lg ulockd-btn-thm2 ulockd-mrgn315" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</button>
					<button type="submit" class="btn btn-lg ulockd-btn-styledark">Join With Us</button>
				</div>
			</div>
		</div>
	</section>

	<!-- Our About -->
	<section class="ulockd-about2">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-7">
					<div class="ulock-about">
						<h2 class="title-bottom ulockd-mrgn630">About Be<span class="text-thm2"> aHand</span></h2>
						<p>Be aHand Is a Most Charity/ Non-profit/ Fundraising/ NGO organizations. Now Be aHand Is a Biggest organizations In This Globe. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo repudiandae sunt delectus praesentium adipisci voluptatem sed, consectetur! Optio quis alias necessitatibus quidem dolore est nobis iusto, doloremque, velit vel, eligendi excepturi iure quas dignissimos eius.</p>
						<p>Consectetur adipisicing elit. Assumenda in, animi facere illum culpa autem minima nostrum doloribus dignissimos!</p>
						<h4>History Of Be aHand</h4>
						<p>Be aHand Start Their Work With Small organizations In The Year 1990.Now Be aHand is world wide organizations. There Consectetur adipisicing elit. Nemo repudiandae sunt delectus praesentium adipisci voluptatem sed, consectetur! Optio quis alias necessitatibus quidem.</p>
						<button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
					</div>
				</div>
				<div class="col-sm-12 col-md-5">
					<div class="ulockd-about-box ulockd-mrgn1260">
						<div class="ab-thumb">
							<img class="img-responsive img-whp" src="{{ asset('front/images/about/1.jpg') }}" alt="1.jpg') }}">
						</div>
						<p class="text-center ulockd-mrgn1210">Be aHand Start Their Work With Small organizations In The Year 1990.Now Be aHand is world wide organizations.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Gallery -->
	<section class="ulockd-service-three">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
					<div class="ulockd-main-title">
						<h2 class="text-uppercase">Our Photo <span class="text-thm2">Gallery</span></h2>
						<h4>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</h4>
					</div>
				</div>
			</div>
            <div class="row">
	            <div class="col-md-12">
	                <!-- Masonry Filter -->
	                <ul class="list-inline masonry-filter text-center">
	                    <li><a href="#" class="active" data-filter="*">All</a></li>
	                    <li><a href="#" data-filter=".charity" class="">Charity</a></li>
	                    <li><a href="#" data-filter=".children" class="">Children</a></li>
	                    <li><a href="#" data-filter=".education" class="">Education</a></li>
	                    <li><a href="#" data-filter=".fundraisin" class="">Fundraising</a></li>
	                    <li><a href="#" data-filter=".clothing" class="">Clothing</a></li>
	                </ul>
	                <!-- End Masonry Filter -->

	                <!-- Masonry Grid -->
	                <div id="grid" class="masonry-gallery grid-four-item clearfix">

		                <!-- Masonry Item -->
		                <div class="isotope-item charity children">
		                    <div class="gallery-thumb">
			                    <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/1.jpg') }}" alt="project">
			                    <div class="overlayer">
									<div class="lbox-caption">
										<div class="lbox-details">
											<h5>Gallery Title Here</h5>
											<ul class="list-inline">
												<li>
													<a class="popup-img" href="{{ asset('front/images/gallery/1.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
												</li>
												<li>
													<a class="link-btn" href="#" ><span class="flaticon-link-symbol"></span></a>
												</li>
											</ul>
										</div>
									</div>
			                    </div>
		                    </div>
		                </div>

		                <!-- Masonry Item -->
		                <div class="isotope-item children education clothing">
		                    <div class="gallery-thumb">
			                    <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/2.jpg') }}" alt="project">
			                    <div class="overlayer">
									<div class="lbox-caption">
										<div class="lbox-details">
											<h5>Gallery Title Here</h5>
											<ul class="list-inline">
												<li>
													<a class="popup-img" href="{{ asset('front/images/gallery/2.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
												</li>
												<li>
													<a class="link-btn" href="#" ><span class="flaticon-link-symbol"></span></a>
												</li>
											</ul>
										</div>
									</div>
			                    </div>
		                    </div>
		                </div>

		                <!-- Masonry Item -->
		                <div class="isotope-item new children clothing">
		                    <div class="gallery-thumb">
			                    <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/3.jpg') }}" alt="project">
			                    <div class="overlayer">
									<div class="lbox-caption">
										<div class="lbox-details">
											<h5>Gallery Title Here</h5>
											<ul class="list-inline">
												<li>
													<a class="popup-img" href="{{ asset('front/images/gallery/3.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
												</li>
												<li>
													<a class="link-btn" href="#" ><span class="flaticon-link-symbol"></span></a>
												</li>
											</ul>
										</div>
									</div>
			                    </div>
		                    </div>
		                </div>

		                <!-- Masonry Item -->
		                <div class="isotope-item charity">
		                    <div class="gallery-thumb">
			                    <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/4.jpg') }}" alt="project">
			                    <div class="overlayer">
									<div class="lbox-caption">
										<div class="lbox-details">
											<h5>Gallery Title Here</h5>
											<ul class="list-inline">
												<li>
													<a class="popup-img" href="{{ asset('front/images/gallery/4.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
												</li>
												<li>
													<a class="link-btn" href="#" ><span class="flaticon-link-symbol"></span></a>
												</li>
											</ul>
										</div>
									</div>
			                    </div>
		                    </div>
		                </div>

		                <!-- Masonry Item -->
		                <div class="isotope-item children clothing">
		                    <div class="gallery-thumb">
			                    <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/5.jpg') }}" alt="project">
			                    <div class="overlayer">
									<div class="lbox-caption">
										<div class="lbox-details">
											<h5>Gallery Title Here</h5>
											<ul class="list-inline">
												<li>
													<a class="popup-img" href="{{ asset('front/images/gallery/5.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
												</li>
												<li>
													<a class="link-btn" href="#" ><span class="flaticon-link-symbol"></span></a>
												</li>
											</ul>
										</div>
									</div>
			                    </div>
		                    </div>
		                </div>

		                <!-- Masonry Item -->
		                <div class="isotope-item new education fundraisin">
		                    <div class="gallery-thumb">
			                    <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/6.jpg') }}" alt="project">
			                    <div class="overlayer">
									<div class="lbox-caption">
										<div class="lbox-details">
											<h5>Gallery Title Here</h5>
											<ul class="list-inline">
												<li>
													<a class="popup-img" href="{{ asset('front/images/gallery/6.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
												</li>
												<li>
													<a class="link-btn" href="#" ><span class="flaticon-link-symbol"></span></a>
												</li>
											</ul>
										</div>
									</div>
			                    </div>
		                    </div>
		                </div>

		                <!-- Masonry Item -->
		                <div class="isotope-item fundraisin">
		                    <div class="gallery-thumb">
			                    <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/7.jpg') }}" alt="project">
			                    <div class="overlayer">
									<div class="lbox-caption">
										<div class="lbox-details">
											<h5>Gallery Title Here</h5>
											<ul class="list-inline">
												<li>
													<a class="popup-img" href="{{ asset('front/images/gallery/7.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
												</li>
												<li>
													<a class="link-btn" href="#" ><span class="flaticon-link-symbol"></span></a>
												</li>
											</ul>
										</div>
									</div>
			                    </div>
		                    </div>
		                </div>

		                <!-- Masonry Item -->
		                <div class="isotope-item charity">
		                    <div class="gallery-thumb">
			                    <img class="img-responsive img-whp" src="{{ asset('front/images/gallery/8.jpg') }}" alt="project">
			                    <div class="overlayer">
									<div class="lbox-caption">
										<div class="lbox-details">
											<h5>Gallery Title Here</h5>
											<ul class="list-inline">
												<li>
													<a class="popup-img" href="{{ asset('front/images/gallery/8.jpg') }}" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a>
												</li>
												<li>
													<a class="link-btn" href="#" ><span class="flaticon-link-symbol"></span></a>
												</li>
											</ul>
										</div>
									</div>
			                    </div>
		                    </div>
		                </div>

		                <!-- Masonry = Masonry Item -->
	                </div>
	                <!-- Masonry Gallery Grid Item -->
	            </div>
            </div>
		</div>
	</section>

	<!-- Our Service -->
	<section class="ulockd-service-two">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="ulockd-main-title">
						<h2 class="text-uppercase">Our <span class="text-thm2">Mission</span></h2>
						<h4>Your Attention Is Changed The Part Of World.Give a helping hand to those who need it!</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 clearfix">
					<div class="ulockd-mssn-col ulockd-mrgn650">
						<div class="missn-icon"><span class="flaticon-rice"></span></div>
						<div class="missn-details">
							<h3>Charity For Food</h3>
							<p>This level of development and supervision is for individuals who can't live without anyone else's input yet who.</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 clearfix">
					<div class="ulockd-mssn-col ulockd-mrgn650">
						<div class="missn-icon"><span class="flaticon-t-shirt-black-silhouette"></span></div>
						<div class="missn-details">
							<h3>Charity For Cloth</h3>
							<p>This level of development and supervision is for individuals who can't live without anyone else's input yet who.</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 clearfix">
					<div class="ulockd-mssn-col ulockd-mrgn650">
						<div class="missn-icon"><span class="flaticon-business-8"></span></div>
						<div class="missn-details">
							<h3>Charity For Education</h3>
							<p>This level of development and supervision is for individuals who can't live without anyone else's input yet who.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 clearfix">
					<div class="ulockd-mssn-col">
						<div class="missn-icon"><span class="flaticon-health-care"></span></div>
						<div class="missn-details">
							<h3>Charity For Health</h3>
							<p>This level of development and supervision is for individuals who can't live without anyone else's input yet who.</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 clearfix">
					<div class="ulockd-mssn-col">
						<div class="missn-icon"><span class="flaticon-woman-and-child-holding-hands"></span></div>
						<div class="missn-details">
							<h3>Charity For Shelter</h3>
							<p>This level of development and supervision is for individuals who can't live without anyone else's input yet who.</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 clearfix">
					<div class="ulockd-mssn-col">
						<div class="missn-icon"><span class="flaticon-water"></span></div>
						<div class="missn-details">
							<h3>Charity For Clean Water</h3>
							<p>This level of development and supervision is for individuals who can't live without anyone else's input yet who.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

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
