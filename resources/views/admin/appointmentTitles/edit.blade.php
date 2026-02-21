@extends('admin_master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Appointment Title</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/appointment-titles')}}">All Appointment Title
                                </a></li>
                            <li class="breadcrumb-item active">Edit Appointment Title</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Edit Appointment Title</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('appointment-titles.update',$appointmentTitle->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="required">*</span></label>
                                    <textarea
                                        class="form-control description"
                                        required=""
                                        name="title">
                                        {!! old('title', $appointmentTitle->title) !!}
                                    </textarea>
                                    @error('title')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="img">Image <span class="required">*</span></label>
                                    <input
                                        name="img"
                                        type="file"
                                        id="img"
                                        accept="image/*"
                                        class="dropify"
                                        data-height="150"
                                        data-default-file="{{ asset($appointmentTitle->img) }}"
                                    />
                                    @error('img')
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
