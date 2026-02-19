@extends('admin_master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Award Title</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/award-titles')}}">All Award Title
                                </a></li>
                            <li class="breadcrumb-item active">Edit Award Title</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Edit Award Title</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('award-titles.update',$awardTitle->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Title <span class="required">*</span></label>
                                    <input
                                        type="text"
                                        name="description"
                                        class="form-control"
                                        id="description"
                                        placeholder="Title"
                                        required=""
                                        value="{{ old('description', $awardTitle->description) }}"
                                    >
                                    @error('description')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group w-100 px-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection

@push('scripts')

    <script>

    </script>

@endpush
