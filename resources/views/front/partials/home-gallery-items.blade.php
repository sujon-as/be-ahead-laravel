@foreach($images as $img)
    <div class="isotope-item {{ $img->category->id }}">
        <div class="gallery-thumb">
            <img class="img-responsive img-whp"
                 src="{{ asset($img->image) }}"
                 loading="lazy"
                 alt="{{ $img->title }}">

            <div class="overlayer">
                <div class="lbox-caption">
                    <div class="lbox-details">
                        <h5>{{ $img->title }}</h5>
                        <ul class="list-inline">
                            <li>
                                <a class="popup-img"
                                   href="{{ asset($img->image) }}"
                                   title="Gallery Photos">
                                    <span class="flaticon-add-square-button"></span>
                                </a>
                            </li>
                            <li>
                                <a class="link-btn" href="#">
                                    <span class="flaticon-link-symbol"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
