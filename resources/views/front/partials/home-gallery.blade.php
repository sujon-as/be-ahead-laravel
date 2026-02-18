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
                @if(count($galleryCategories) > 0)
                    <ul class="list-inline masonry-filter text-center">
                        <li>
                            <a href="#" class="active gallery-filter" data-type="all">All</a>
                        </li>
                        @foreach($galleryCategories as $category)
                            <li>
                                <a href="#"
                                   class="gallery-filter"
                                   data-id="{{ $category->id }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!-- Masonry Grid -->
                <div id="grid" class="masonry-gallery grid-four-item clearfix">
                    <div id="gallery-wrapper">
                        <!-- AJAX content will load here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function loadAllGallery() {
        fetch('/ajax/home-gallery/all')
            .then(res => res.text())
            .then(html => {
                document.getElementById('gallery-wrapper').innerHTML = html;
                $('#grid').isotope('destroy');
                $('#grid').isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'masonry'
                });
            });
    }

    // First load → All
    loadAllGallery();

    document.querySelectorAll('.gallery-filter').forEach(btn => {
        btn.addEventListener('click', function(e){
            e.preventDefault();

            document.querySelectorAll('.gallery-filter')
                .forEach(b => b.classList.remove('active'));

            this.classList.add('active');

            let type = this.dataset.type;
            let id = this.dataset.id;

            if(type === 'all'){
                loadAllGallery();
            } else {
                fetch('/ajax/home-gallery/category/' + id)
                    .then(res => res.text())
                    .then(html => {
                        document.getElementById('gallery-wrapper').innerHTML = html;
                        $('#grid').isotope('destroy');
                        $('#grid').isotope({
                            itemSelector: '.isotope-item',
                            layoutMode: 'masonry'
                        });
                    });
            }
        });
    });
</script>
