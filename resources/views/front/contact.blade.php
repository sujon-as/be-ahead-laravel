@extends('front.layouts.master')

@section('title', 'Contact Us')

@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-header">
                        <h2>Contact Us</h2>
                        <ul class="list-inline ulockd-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Contact -->
    <section class="ulockd-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="ulockd-main-title">
                        <h2 class="text-uppercase">Get In <span class="text-thm2">Touch</span></h2>
                        <p>We are Charity/ Non-profit/ Fundraising/ NGO organizations.Help a child Without Family. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, distinctio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="ulockd-contact-info text-center">
                        <div class="ulockd-icon-box"><span class="flaticon-map-pin-marked"></span></div>
                        <h3>Our Location</h3>
                        <p>121 King Street, Melbourne, Australia</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ulockd-contact-info text-center">
                        <div class="ulockd-icon-box"><span class="flaticon-old-handphone"></span></div>
                        <h3>Phone Number</h3>
                        <p>+88 012 345 6789</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ulockd-contact-info text-center">
                        <div class="ulockd-icon-box"><span class="flaticon-black-back-closed-envelope-shape"></span></div>
                        <h3>Email Address</h3>
                        <p>info@unlockdesizn.com</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="ulockd-login-form">
                        <h2 class="text-center">Send Us A Message</h2>
                        <form id="contact_form" name="contact_form" class="contact-form" action="http://unlockdesizn.com/html/nonprofit/be-ahand/includes/contact.php" method="post" novalidate="novalidate">
                            <div class="messages"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_name" name="form_name" class="form-control" placeholder="Your Name *" required="required" data-error="Name is required." type="text">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_email" name="form_email" class="form-control" placeholder="Your Email *" required="required" data-error="Email is required." type="email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_subject" name="form_subject" class="form-control" placeholder="Subject" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="form_message" class="form-control" placeholder="Your Message *" rows="4" required="required" data-error="Message is required."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group text-center">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" value="" type="hidden">
                                        <button type="submit" class="btn btn-lg ulockd-btn-thm2" data-loading-text="Getting Ready...">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
