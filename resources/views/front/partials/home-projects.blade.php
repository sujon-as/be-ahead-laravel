<section class="our-projects">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="ulockd-main-title">
                    {!! $projectTitle->description !!}
                </div>
            </div>
        </div>
        @foreach($projects->chunk(2) as $chunk)
            <div class="row ulockd-mrgn1225">
                @foreach($chunk as $project)
                    <div class="project-box">
                        <div class="col-sm-4 col-md-2 pb-thumb ulockd-pad395">
                            <img class="img-responsive img-whp" src="{{ asset($project->image) }}" alt="1a.jpg') }}">
                            <div class="donate-button"><a href="{{ route('donation') }}" class="btn ulockd-btn-thm2" data-toggle="modal" data-target=".bs-example-modal-default">Donate now</a></div>
                        </div>
                        <div class="col-sm-8 col-md-4 pb-details">
                            {!! $project->description !!}
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>
