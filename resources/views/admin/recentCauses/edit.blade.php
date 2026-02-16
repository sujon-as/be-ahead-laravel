@extends('admin_master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Recent Causes</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/front_recent_cause')}}">All Recent Causes</a></li>
                            <li class="breadcrumb-item active">Edit Recent Causes</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Edit Features</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('front-recent-causes.update',$front_recent_cause->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="img">Background Image <span class="required">*</span></label>
                                    <input
                                        name="img"
                                        type="file"
                                        id="img"
                                        accept="image/*"
                                        class="dropify"
                                        data-height="150"
                                        data-default-file="{{asset($front_recent_cause->img)}}"
                                    />
                                    @error('img')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="percentage">Recent Causes Percentage <span class="required">*</span></label>
                                    <input
                                        type="text"
                                        name="percentage"
                                        class="form-control"
                                        id="percentage"
                                        placeholder="Recent Causes Percentage"
                                        required=""
                                        value="{{old('percentage', $front_recent_cause->percentage)}}"
                                    >
                                    @error('percentage')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">Recent Causes Title 2 <span class="required">*</span></label>
                                    <textarea class="form-control description" required="" name="content">
                                    {!! old('content', $front_recent_cause->content) !!}
                                </textarea>
                                    @error('content')
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

    <script src="{{asset('custom/multiple_files.js')}}"></script>

    <script>

    </script>

@endpush
