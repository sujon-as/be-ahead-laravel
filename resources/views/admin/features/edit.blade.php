@extends('admin_master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Features</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/feature')}}">All Features</a></li>
                            <li class="breadcrumb-item active">Edit Features</li>
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
                <form action="{{route('features.update',$feature->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title_1">Features Title 1 <span class="required">*</span></label>
                                    <input
                                        type="text"
                                        name="title_1"
                                        class="form-control"
                                        id="title_1"
                                        placeholder="Features Title 1"
                                        required=""
                                        value="{{old('title_1', $feature->title_1)}}"
                                    >
                                    @error('title_1')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title_2">Features Title 2 <span class="required">*</span></label>
                                    <input
                                        type="text"
                                        name="title_2"
                                        class="form-control"
                                        id="title_2"
                                        placeholder="Features Title 2"
                                        required=""
                                        value="{{old('title_2', $feature->title_2)}}"
                                    >
                                    @error('title_2')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status <span class="required">*</span></label>
                                    <select class="form-control select2bs4" name="status" id="status" required="">
                                        <option value="" selected="" disabled="">Select One</option>
                                        <option value="Active" @if($feature->status === 'Active') selected @endif>Active</option>
                                        <option value="Inactive" @if($feature->status === 'Inactive') selected @endif>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bg_img">Background Image <span class="required">*</span></label>
                                    <input
                                        name="bg_img"
                                        type="file"
                                        id="bg_img"
                                        accept="image/*"
                                        class="dropify"
                                        data-height="150"
                                        data-default-file="{{ asset($feature->bg_img) }}"
                                    />
                                    @error('bg_img')
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
