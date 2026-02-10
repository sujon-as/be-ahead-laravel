<section class="ulockd-footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="ulockd-footer-widget">
    					<img alt="" src="{{ ($settings && $settings->logo) ? $settings->logo : asset('front/images/footer-logo.png') }}" class="img-responsive ulockd-footer-log">
    					<p class="ulockd-ftr-text">
                            {{ ($settings && $settings->footer_txt) ? $settings->footer_txt : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec eros eget nisl fringilla commodo. Donec nec eros eget nisl fringilla commodo.' }}
                        </p>
    					<ul class="list-unstyled">
    						<li><a href="#"><span class="flaticon-old-handphone text-thm2"></span> {{ ($settings && $settings->phone) ? $settings->phone : '+123456789' }}</a> </li>
    						<li><a href="#"><span class="flaticon-black-back-closed-envelope-shape text-thm2"></span> {{ ($settings && $settings->email) ? $settings->email : 'example@example.com' }}</a></li>
    						<li><a href="#"><span class="flaticon-house text-thm2"></span> {{ ($settings && $settings->address) ? $settings->address : 'Victoria 8007 Australia Envato HQ 121 King Street, Melbourne.' }}</a></li>
    					</ul>
    				</div>
					<ul class="list-inline ulockd-footer-font-icon ulockd-mrgn1220">
						<li><a href="{{ ($settings && $settings->facebook) ? $settings->facebook : '#' }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="{{ ($settings && $settings->rss_feed) ? $settings->rss_feed : '#' }}" target="_blank"><i class="fa fa-feed"></i></a></li>
						<li><a href="{{ ($settings && $settings->google_plus) ? $settings->google_plus : '#' }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="{{ ($settings && $settings->pinterest) ? $settings->pinterest : '#' }}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="{{ ($settings && $settings->instagram) ? $settings->instagram : '#' }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="ulockd-footer-lnews">
						<h3 class="text-uppercase">Latest News</h3>
						<div class="ulockd-media-box">
							<div class="media">
							    <div class="media-left pull-left">
								    <a href="#">
								    	<img class="media-object" src="{{ asset('front/images/blog/s1.jpg') }}" alt="s1.jpg">
								    </a>
							    </div>
							    <div class="media-body">
									<a href="#" class="post-date">21 January, 2017</a>
							    	<h4 class="media-heading">Let's Move Blog</h4>
							    	<p>Notice coding for Alzheimer's conclusion steps nearer...</p>
							    </div>
							</div>
							<div class="media">
							    <div class="media-left pull-left">
								    <a href="#">
								    	<img class="media-object" src="{{ asset('front/images/blog/s2.jpg') }}" alt="s2.jpg">
								    </a>
							    </div>
							  	<div class="media-body">
									<a href="#" class="post-date">21 January, 2017</a>
							    	<h4 class="media-heading">Let's Move Blog</h4>
							    	<p>Notice coding for Alzheimer's conclusion steps nearer...</p>
							  	</div>
							</div>
							<div class="media">
							    <div class="media-left pull-left">
								    <a href="#">
								    	<img class="media-object" src="{{ asset('front/images/blog/s3.jpg') }}" alt="s3.jpg">
								    </a>
							    </div>
							  	<div class="media-body">
									<a href="#" class="post-date">21 January, 2017</a>
							    	<h4 class="media-heading">Let's Move Blog</h4>
							    	<p>Notice coding for Alzheimer's conclusion steps nearer...</p>
							  	</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 ulockd-pad395">
					<div class="ulockd-footer-qlink">
						<h3 class="text-uppercase">TWITTER</h3>
						<div class="twitter"></div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
					<div class="flickr-widget">
						<h3 class="text-uppercase">Flickr Feed</h3>
						<ul class="list-inline">
							<li>
								<div class="thumb">
									<img alt="flckr1.jpg" src="{{ asset('front/images/gallery/flckr1.jpg') }}" class="img-responsive img-whp">
									<div class="overlay">
										<span class="flaticon-add"></span>
									</div>
								</div>
							</li>
							<li>
								<div class="thumb">
									<img alt="" src="{{ asset('front/images/gallery/flckr2.jpg') }}" class="img-responsive img-whp">
									<div class="overlay">
										<span class="flaticon-add"></span>
									</div>
								</div>
							</li>
							<li>
								<div class="thumb">
									<img alt="" src="{{ asset('front/images/gallery/flckr3.jpg') }}" class="img-responsive img-whp">
									<div class="overlay">
										<span class="flaticon-add"></span>
									</div>
								</div>
							</li>
							<li>
								<div class="thumb">
									<img alt="" src="{{ asset('front/images/gallery/flckr4.jpg') }}" class="img-responsive img-whp">
									<div class="overlay">
										<span class="flaticon-add"></span>
									</div>
								</div>
							</li>
							<li>
								<div class="thumb">
									<img alt="" src="{{ asset('front/images/gallery/flckr5.jpg') }}" class="img-responsive img-whp">
									<div class="overlay">
										<span class="flaticon-add"></span>
									</div>
								</div>
							</li>
							<li>
								<div class="thumb">
									<img alt="" src="{{ asset('front/images/gallery/flckr6.jpg') }}" class="img-responsive img-whp">
									<div class="overlay">
										<span class="flaticon-add"></span>
									</div>
								</div>
							</li>
						</ul>
					</div>
                    <!--
    				<div class="ulockd-footer-newsletter">
    					<h4 class="title text-uppercase">News Letter</h4>
		                <form class="ulockd-mailchimp">
		                    <div class="input-group">
			                    <input type="email" class="form-control input-md" placeholder="Your email" name="EMAIL" value="">
			                    <span class="input-group-btn">
			                        <button type="submit" class="btn btn-md"><i class="icon flaticon-right-arrow"></i></button>
			                    </span>
		                    </div>
		                </form>
    				</div>
                    -->
				</div>
			</div>
		</div>
	</section>

	<!-- Our CopyRight Section -->
	<section class="ulockd-copy-right">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="color-white">
                        {{ ($settings && $settings->copyright_mgs) ? $settings->copyright_mgs : 'copyright © 2026' }}
                    </p>
				</div>
			</div>
		</div>
	</section>
