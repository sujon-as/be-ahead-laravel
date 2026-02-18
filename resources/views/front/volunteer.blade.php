@extends('front.layouts.master')

@section('title', 'Volunteers')

@section('content')
    <!-- Inner Page Breadcrumb -->
    <section class="inner-page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb-header">
                        <h2>Volunteers Registration</h2>
                        <ul class="list-inline ulockd-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Volunteers Registration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="ulockd-team-one">
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
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="ulockd-team-member">
                        <div class="team-thumb">
                            <img class="img-responsive img-whp" src="{{ asset('front/images/about/4.jpg') }}" alt="4.jpg">
                        </div>
                        <div class="team-details text-left">
                            <p>Consectetur adipisicing elit. Expedita quos quam laboriosam deserunt obcaecati eaque officiis minima tempore blanditiis, dolorem. Provident illo, id culpa, quibusdam ullam quod nobis consectetur, veniam cum, neque vitae delectus in eveniet. Optio sapiente nulla minima aspernatur odit nam facilis perferendis.</p>
                            <p>Tpsum dolor sit amet, consectetur adipisicing elit. Porro labore, voluptatem assumenda ipsam qui vero molestias, delectus reiciendis repellendus dolor fuga beatae!</p>
                            <p>Tpsum dolor sit amet, consectetur adipisicing elit. Porro labore, voluptatem assumenda ipsam qui vero molestias, delectus reiciendis repellendus dolor fuga beatae!</p>
                            <ul class="list-unstyled ulockd-mrgn1220">
                                <li><h4><span class="flaticon-email-filled-closed-envelope text-thm2"></span> Call Us At: +98 9875 5968 54</h4></li>
                                <li><h4><span class="flaticon-telephone-1 text-thm2"></span> Mail Us At: yourmail@email.com</h4></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <form class="volunteer-reg-form">
                        <h3 class="well">Registration Form</h3>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>First Name</label>
                                <input type="text" placeholder="Enter First Name Here.." class="form-control">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Last Name</label>
                                <input type="text" placeholder="Enter Last Name Here.." class="form-control">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>Phone Number</label>
                                <input type="text" placeholder="Enter Phone Number Here.." class="form-control">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>Email Address</label>
                                <input type="text" placeholder="Enter Email Address Here.." class="form-control">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>Address</label>
                                <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>City</label>
                                <input type="text" placeholder="Enter City Name" class="form-control">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>State</label>
                                <input type="text" placeholder="Enter State Name" class="form-control">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Zip</label>
                                <input type="text" placeholder="Enter Zip Code" class="form-control">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>Country</label>
                                <input type="text" placeholder="Enter Designation" class="form-control">
                                <button type="button" class="btn btn-lg ulockd-btn-thm2 ulockd-mrgn1220">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
