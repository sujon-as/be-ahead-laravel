<div class="ulockd-faq-content">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        @foreach($faqs as $key => $faq)
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="{{'heading-' . $key }}">
                    <h4 class="panel-title">
                        <a role="button"
                           data-toggle="collapse"
                           data-parent="#accordion"
                           href="#collapse-{{ $key }}"
                           aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                           aria-controls="collapse-{{ $key }}">

                            <i class="fa fa-angle-down icon-1"></i>
                            <i class="fa fa-angle-up icon-2"></i>

                            {{ $faq->question ?? '' }}
                        </a>
                    </h4>
                </div>
                <div
                    id="{{'collapse-' . $key}}"
                    class="panel-collapse collapse {{ $key === 0 ? 'in' : '' }}"
                    role="tabpanel"
                    aria-labelledby="{{'heading-' . $key }}">
                    <div class="panel-body">
                        <p>{{ $faq->answer ?? '' }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
