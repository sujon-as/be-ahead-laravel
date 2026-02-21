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
                <ul class="list-inline masonry-filter text-center">
                    <li>
                        <a href="#" class="active" data-filter="*">All</a>
                    </li>
                    @foreach($galleryCategories as $category)
                        <li>
                            <a href="#" data-filter=".category-{{ $category->id }}">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div id="grid" class="masonry-gallery grid-four-item clearfix">
                    @foreach($images as $img)
                        <div class="isotope-item category-{{ $img->gallery_category_id }}">
                            <div class="gallery-thumb">
                                <img class="img-responsive img-whp"
                                     src="{{ asset($img->image) }}"
                                     alt="{{ $img->title }}">

                                <div class="overlayer">
                                    <div class="lbox-caption">
                                        <div class="lbox-details">
                                            <h5>{{ $img->title }}</h5>
                                            <ul class="list-inline">
                                                <li>
                                                    <a class="popup-img" href="{{ asset($img->image) }}">
                                                        <span class="flaticon-add-square-button"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize isotope
            var $grid = $('#grid').isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'masonry',
                masonry: {
                    columnWidth: '.isotope-item',
                    gutter: 10
                }
            });

            // Filter items on button click
            $('.masonry-filter').on('click', 'a', function(e) {
                e.preventDefault();

                var filterValue = $(this).attr('data-filter');

                $grid.isotope({ filter: filterValue });

                $('.masonry-filter a').removeClass('active');
                $(this).addClass('active');
            });

            // Layout after images load
            $grid.imagesLoaded().progress(function() {
                $grid.isotope('layout');
            });
        });
    </script>
@endpush
