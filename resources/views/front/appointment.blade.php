@extends('front.layouts.master')

@section('title', 'Appointment')

@section('content')
    <!-- Home Design Inner Pages -->
    <div class="ulockd-inner-home">
        <div class="container text-center">
            <div class="row">
                <div class="ulockd-inner-conraimer-details">
                    <div class="col-md-12">
                        <h1 class="text-uppercase">APPOINTMENT</h1>
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
                            <li> <a href="{{ route('appointment') }}"> APPOINTMENT </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our About -->
    <section class="ulockd-about-one inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-7">
                    <!-- Appointment Form Starts -->
                    <form id="appointment_form" name="appointment_form" class="appointment_form text-center" action="#" method="post" novalidate="novalidate">
                        <div class="messages"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Appointment with Expert</h2>
                                <p>Let's Appointment With our Exparts Who Try to Solved Your Problem.</p>
                                <div class="form-group text-left">
                                    <label for="form_name"><i class="fa fa-user-o"></i> Name <small>*</small></label>
                                    <input id="form_name" name="form_name" class="form-control" placeholder="enter a name" required="required" data-error="Name is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label for="form_email"><i class="fa fa-envelope-open-o"></i> Email <small>*</small></label>
                                    <input id="form_email" name="form_email" class="form-control required email" placeholder="enter an email" required="required" data-error="Email is required." type="email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label for="form_date"><i class="fa fa-calendar-check-o"></i> Date <small>*</small></label>
                                    <input id="form_date" name="form_date" class="form-control required datepicker" placeholder="enter a date" required="required" data-error="Subject is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label for="form_phone"><i class="fa fa-phone"></i> Phone <small>*</small></label>
                                    <input id="form_phone" name="form_phone" class="form-control required" placeholder="enter a phone" required="required" data-error="Phone Number is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-left">
                            <label for="form_name"><i class="fa fa-file-text-o"></i> Message</label>
                            <textarea id="form_message" name="form_message" class="form-control required" rows="5" placeholder="type in a message" required="required" data-error="Message is required."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group text-center">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" value="" type="hidden">
                            <button type="submit" class="btn btn-lg ulockd-btn-thm2" data-loading-text="Getting Few Sec...">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="ulockd-about-thumb">
                        <img class="img-responsive img-whp" src="{{ asset('front/images/about/1.png') }}" alt="1.png">
                        <h2 class="ulockd-about-thumb-ttl">Vice Precident <span class="text-thm2">Be aHand</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our About Page faq Section -->
    <section class="ulockd-ap-faq">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h2 class="ulockd-mrgn120">Be aHand  <span class="text-thm2">Activity</span></h2>
                    <div class="ulockd-about-video ulockd-mrgn1225">
                        <iframe width="100%" height="265px" src="http://www.youtube.com/embed/qKoVto0Wegg?autoplay=0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                   <div class="ulockd-faq-box">
                        <div class="ulockd-faq-title clearfix">
                            <h2>Frequently Asked  <span class="text-thm2">Questions</span></h2>
                        </div>
                        <div class="ulockd-faq-content">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          <i class="fa fa-angle-down icon-1"></i>
                                          <i class="fa fa-angle-up icon-2"></i>
                                          What is Charity?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non laboriosam dolores qui unde sequi nulla facilis neque. Molestiae ducimus, ad quam similique, minus nulla sunt pariatur vitae eligendi voluptatem voluptas voluptatibus nisi porro nemo nihil expedita eos repellat nobis delectus blanditiis libero.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fa fa-angle-down icon-1"></i>
                                            <i class="fa fa-angle-up icon-2"></i>
                                            What amount about donation?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia sint quos unde, commodi consequuntur quas, error aperiam nemo vitae maiores illum voluptate repudiandae sed assumenda aliquam, ipsum praesentium alias. Itaque illo, rem maiores!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <i class="fa fa-angle-down icon-1"></i>
                                                <i class="fa fa-angle-up icon-2"></i>
                                                About Charity/ Non-profit Organization?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                          <p>Yes. Administrations are accessible for as meager as a couple of hours a visit up to 24 hours, 7 days seven days, 365 days a year.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our First Divider -->
    <section class="ulockd-frst-divider">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="ulockd-dvidr-mttl">We Work As a Charity/ Social/ Non-profit/ NGO/ Foundarisign Organization.</h2>
                    <div class="ulockd-dvidr-btn text-uppercase"><a class="btn btn-default ulockd-btn-white hvr-overline-from-center" href="#" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</a></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="ulockd-team">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                    <div class="ulockd-main-title">
                        <h2 class="text-uppercase">OUR <span class="text-thm2">VOLUNTEERS</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa doloribus, hic eaque asperiores saepe aspernatur quibusdam beatae?</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="ulockd-team-member">
                        <div class="team-thumb">
                            <img class="img-responsive img-whp" src="{{ asset('front/images/team/1.jpg') }}" alt="team1.jpg">
                            <div class="team-overlay">
                                <ul class="list-inline team-icon style2">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="mailto:name@email.com"><i class="fa fa-envelope"></i> Email</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-details text-left">
                            <h3 class="member-name">John Smith</h3>
                            <h5 class="member-post">- Volunteer</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo.</p>
                            <button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="ulockd-team-member">
                        <div class="team-thumb">
                            <img class="img-responsive img-whp" src="{{ asset('front/images/team/2.jpg') }}" alt="team2.jpg">
                            <div class="team-overlay">
                                <ul class="list-inline team-icon style2">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="mailto:name@email.com"><i class="fa fa-envelope"></i> Email</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-details text-left">
                            <h3 class="member-name">Ana Smith</h3>
                            <h5 class="member-post">- Volunteer</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi.</p>
                            <button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="ulockd-team-member">
                        <div class="team-thumb">
                            <img class="img-responsive img-whp" src="{{ asset('front/images/team/3.jpg') }}" alt="3.jpg">
                            <div class="team-overlay">
                                <ul class="list-inline team-icon style2">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="mailto:name@email.com"><i class="fa fa-envelope"></i> Email</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-details text-left">
                            <h3 class="member-name">Jhon Smith</h3>
                            <h5 class="member-post">- Volunteer</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio.</p>
                            <button type="submit" class="btn btn-default ulockd-btn-thm2">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<!-- Contact Form Validation-->
<script type="text/javascript">
    $(function () {
        $('#appointment_form').validator();
        $('#appointment_form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var url = "includes/appointment.html"; // This should be a Laravel route
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $(this).serialize(),
                    success: function (data)
                    {
                        var messageAlert = 'alert-' + data.type;
                        var messageText = data.message;

                        var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                        if (messageAlert && messageText) {
                            $('#appointment_form').find('.messages').html(alertBox).fadeIn('slow');
                            $('#appointment_form')[0].reset();
                            setTimeout(function(){ $('.messages').fadeOut('slow') }, 6000);
                        }
                    }
                });
                return false;
            }
        })
    });
</script>
@endsection