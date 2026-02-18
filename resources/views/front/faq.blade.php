@extends('front.layouts.master')

@section('title', 'Faq')

@section('content')
    <!-- Home Design Inner Pages -->
    <div class="ulockd-inner-home">
        <div class="container text-center">
            <div class="row">
                <div class="ulockd-inner-conraimer-details">
                    <div class="col-md-12">
                        <h1 class="text-uppercase">Faq</h1>
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
                            <li> <a href="{{ route('faq') }}"> Faq </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our About Page faq Section -->
    <section class="ulockd-ap-faq">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7">
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
                                            What amount about donation?</a>
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
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headignFour">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <i class="fa fa-angle-down icon-1"></i>
                                                <i class="fa fa-angle-up icon-2"></i>
                                                What is Primary Care?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headignFour">
                                        <div class="panel-body">
                                          <p>The term essential care alludes to the sort of restorative care you require first — before you become ill, before you have to see a master, before you have to go to a healing facility.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headignFive">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                <i class="fa fa-angle-down icon-1"></i>
                                                <i class="fa fa-angle-up icon-2"></i>
                                                What if my Comfort Keeper is sick or on vacation?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headignFive">
                                        <div class="panel-body">
                                          <p>Each Comfort Keepers office utilizes a group of parental figures so that your care administration won't be hindered in the event that someone becomes ill or takes some time off. In the event that your Comfort Keeper is inaccessible, the Client Care Coordinator will organize another parental figure and will reach you ahead of time of the change.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headignSix">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                <i class="fa fa-angle-down icon-1"></i>
                                                <i class="fa fa-angle-up icon-2"></i>
                                                Is long term care expensive?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headignSix">
                                        <div class="panel-body">
                                          <p>It can be. Americans burn through billions of dollars a year on different administrations. How much an individual pays relies on upon the sort and measure of administrations gave, where he or she lives, regardless of whether family and companions can give care, and which paid suppliers are utilized.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <h2 class="ulockd-mrgn120">Be aHand  <span class="text-thm2">Activity</span></h2>
                    <div class="ulockd-about-video ulockd-mrgn1225">
                        <div class="ulockd-avdo-thumb">
                            <iframe width="100%" height="465px" src="http://www.youtube.com/embed/qKoVto0Wegg?autoplay=0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
