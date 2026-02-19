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
                    <form class="volunteer-reg-form" action="{{ route('volunteer-reg') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3 class="well">Registration Form</h3>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="f_name">First Name <span class="required">*</span></label>
                                <input
                                    type="text"
                                    placeholder="Enter First Name Here.."
                                    class="form-control"
                                    required=""
                                    name="f_name"
                                >
                                @error('f_name')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="l_name">Last Name <span class="required">*</span></label>
                                <input
                                    type="text"
                                    placeholder="Enter Last Name Here.."
                                    class="form-control"
                                    required=""
                                    name="l_name"
                                >
                                @error('l_name')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="phone">Phone Number <span class="required">*</span></label>
                                <input
                                    type="text"
                                    placeholder="Enter Phone Number Here.."
                                    class="form-control"
                                    required=""
                                    name="phone"
                                >
                                @error('phone')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="email">Email Address <span class="required">*</span></label>
                                <input
                                    type="text"
                                    placeholder="Enter Email Address Here.."
                                    class="form-control"
                                    required=""
                                    name="email"
                                >
                                @error('email')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="address">Address <span class="required">*</span></label>
                                <textarea
                                    placeholder="Enter Address Here.."
                                    rows="3"
                                    required=""
                                    name="address"
                                    class="form-control">

                                </textarea>
                                @error('address')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="city">City <span class="required">*</span></label>
                                <input
                                    type="text"
                                    placeholder="Enter City Name"
                                    class="form-control"
                                    required=""
                                    name="city"
                                >
                                @error('city')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="state">State <span class="required">*</span></label>
                                <input
                                    type="text"
                                    placeholder="Enter State Name"
                                    class="form-control"
                                    required=""
                                    name="state"
                                >
                                @error('state')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="zip">Zip  <span class="required">*</span></label>
                                <input
                                    type="text"
                                    placeholder="Enter Zip Code"
                                    class="form-control"
                                    required=""
                                    name="zip"
                                >
                                @error('zip')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="country">Country  <span class="required">*</span></label>
                                <input
                                    type="text"
                                    placeholder="Enter Designation"
                                    class="form-control"
                                    required=""
                                    name="country"
                                >
                                @error('country')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="image">Image  <span class="required">*</span></label>
                                <input
                                    type="file"
                                    placeholder="Image"
                                    class="form-control"
                                    required=""
                                    name="image"
                                >
                                @error('image')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="btn btn-lg ulockd-btn-thm2 ulockd-mrgn1220">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
