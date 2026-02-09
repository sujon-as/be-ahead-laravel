@extends('front.layouts.master')

@section('title', 'Donation')

@section('content')
    <!-- Home Design Inner Pages -->
    <div class="ulockd-inner-home">
        <div class="container text-center">
            <div class="row">
                <div class="ulockd-inner-conraimer-details">
                    <div class="col-md-12">
                        <h1 class="text-uppercase">DONATION</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Home Design Inner Pages -->
    <div class="ulockd-inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="{{ route('home') }}"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="{{ route('donation') }}"> DONATION </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Our About -->
    <section class="ulockd-about2">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">                     
                            <div class="fservice-box bgc-snowshade">
                                <div class="db-thumb">
                                    <img class="img-responsive img-whp" src="{{ asset('front/images/causes/10in.jpg') }}" alt="10in.jpg">
                                </div>
                                <div class="db-details inner text-left">
                                    <div class="progress-levels ulockd-mrgn1210">
                                        <div class="progress-box wow" data-wow-delay="100ms" data-wow-duration="1500ms">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill ulockd-bgthm" data-percent="80"><div class="percent"></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline">
                                        <li><strong>Raised:</strong> $45000</li>
                                        <li><strong>Goal:</strong> <span class="text-thm2">$70000</span></li>
                                    </ul>
                                    <h3>Charity For Food</h3>
                                    <p>Consectetur adipisicing elit. Sapiente laboriosam corrupti fugit quidem saepe dolor animi, expedita, iste hic deserunt explicabo labore tempore dicta ratione! Dolor ea eum impedit, mollitia, veritatis exercitationem blanditiis molestiae deleniti!.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 donation-form-samount">
                            <h4>Select Your Amount</h4>
                            <ul class="list-inline selected-amount">
                                <li class="amount-box">
                                    <input id="radio-one" type="radio" name="payment-group">
                                    <label for="radio-one"> $10</label>
                                </li>
                                <li class="amount-box">
                                    <input id="radio-two" type="radio" name="payment-group">
                                    <label for="radio-two"> $20</label>
                                </li>
                                <li class="amount-box">
                                    <input id="radio-three" type="radio" name="payment-group">
                                    <label for="radio-three"> $30</label>
                                </li>
                                <li class="amount-box">
                                    <input id="radio-four" type="radio" name="payment-group">
                                    <label for="radio-four"> $50</label>
                                </li>
                                <li class="amount-box">
                                    <input id="radio-five" type="radio" name="payment-group">
                                    <label for="radio-five"> $100</label>
                                </li>
                                <li class="ulockd-mrgn950">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">$</div>
                                                <input type="number" class="form-control" id="exampleInputAmount" placeholder="Custom Amount">
                                                <div class="input-group-addon">.00</div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                            <h5>Would you like to make regular donations?</h5>
                            <ul class="list-inline">
                                <li><p>I would like to make </p></li>
                                <li>
                                    <select name="pts" class="payment-time-selection">
                                        <option value="0">a one time</option>
                                        <option value="W">weekly</option>
                                        <option value="M">monthly</option>
                                        <option value="Y">yearly</option>
                                    </select>
                                </li>
                                <li> Donations</li>
                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <form class="donation-form donor-details">
                                <h4>Donor Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control required" id="exampleInputNamex" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control required" id="exampleInputNamexx" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control required" id="exampleInputEmailxy" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control required" id="exampleInputPhone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control required" id="exampleInputAddress" placeholder="Address line 1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control required" id="exampleInputAddress2" placeholder="Address line 2">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control required" id="exampleInputCity" placeholder="City/State">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control required" id="exampleInputZip" placeholder="Zipcode/Postcode">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea id="form_message" name="form_message" class="form-control required" rows="4" placeholder="Additional Note" ></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-lg btn-block ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</button>
                                </div>
                            </form>
                        </div>                      
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 ulockd-pdng0">
                    <h3 class="ulockd-bb-dashed"><span class="flaticon-straight-quotes text-thm1"></span> Testimonial</h3>
                    <div class="ulockd-inr-testimonials">
                        <p>pain was born and I will give you a complete accounf the system, and expound the actuteachings of the grea</p>
                        <div class="ulockd-tm-client-details">
                            <div class="ulockd-tm-name">
                                <h4 class="text-thm1">Gary Watson - <small> Seo</small></h4>
                            </div>
                        </div>
                    </div>
                    <h3 class="ulockd-bb-dashed"><span class="flaticon-calendar text-thm1"></span> Latest Post</h3>
                    <div class="ulockd-lp">
                        <div class="ulockd-latest-post">
                            <div class="media">
                                <div class="media-left pull-left">
                                    <a href="#">
                                        <img class="media-object thumbnail" src="{{ asset('front/images/testimonial/1.jpg') }}" alt="1.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Ana Andreea</h4>
                                    I have constantly believed Be aHand to take care of their patain <a href="#">more...</a>
                                    <strong><a href="#"> 20 Jan 2017 </a></strong>
                                </div>
                            </div>
                        </div>
                        <div class="ulockd-latest-post">
                            <div class="media">
                                <div class="media-left pull-left">
                                    <a href="#">
                                        <img class="media-object thumbnail" src="{{ asset('front/images/testimonial/2.jpg') }}" alt="2.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Simone Andreea</h4>
                                    I have constantly believed Be aHand to take care of their patain <a href="#">more...</a>
                                    <strong><a href="#"> 20 Jan 2017 </a></strong>
                                </div>
                            </div>
                        </div>
                        <div class="ulockd-latest-post">
                            <div class="media">
                                <div class="media-left pull-left">
                                    <a href="#">
                                        <img class="media-object thumbnail" src="{{ asset('front/images/testimonial/3.jpg') }}" alt="3.jpg">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Devid Andreea</h4>
                                    I have constantly believed Mr Fix to take care of busines <a href="#">more...</a>
                                    <strong><a href="#"> 20 Jan 2017 </a></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ulockd-ip-tag">
                        <div class="ulockd-tag-list-title">
                            <h3 class="ulockd-bb-dashed"><span class="flaticon-mark text-thm1"></span> Tags List </h3>
                        </div>
                        <ul class="list-inline ulockd-tag-list-details">
                            <li><a href="#">Photoshop</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">Corses</a></li>
                            <li><a href="#">Primum</a></li>
                            <li><a href="#">Designtuto</a></li>
                            <li><a href="#">Autocad</a></li>
                            <li><a href="#">Development</a></li>
                        </ul>
                    </div>
                <div class="ulockd-ip-flickr">
                    <div class="ulockd-flickr-list-title">
                        <h3 class="ulockd-bb-dashed"><span class="flaticon-flickr text-thm1"></span> Flickr Feed</h3>
                        <div class="flickr-photo"></div>
                    </div>
                </div>
                <div class="ulockd-ip-flickr">
                    <div class="ulockd-flickr-list-title">
                        <h3 class="ulockd-bb-dashed"><span class="flaticon-instagram text-thm1"></span> Instagram Feed</h3>
                        <div id="instagram-feed1"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection