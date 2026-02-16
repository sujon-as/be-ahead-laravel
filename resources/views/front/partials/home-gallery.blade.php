<section class="ulockd-service-three">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-main-title">
                    {!! $gallery->description !!}
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
