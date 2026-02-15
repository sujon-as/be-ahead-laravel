@extends('admin_master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit causeTitles</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/cause-titles')}}">All causeTitles</a></li>
                            <li class="breadcrumb-item active">Edit causeTitles</li>
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
                <form action="{{route('cause-titles.update',$causeTitle->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_1">causeTitles Title 1 <span class="required">*</span></label>
                                    <textarea
                                        class="form-control description"
                                        required=""
                                        name="title_1">
                                        {!! old('title_1',$causeTitle->title_1) !!}
                                    </textarea>
                                    @error('title_1')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_2">causeTitles Title 2 <span class="required">*</span></label>
                                    <textarea
                                        class="form-control description"
                                        required=""
                                        name="title_2">
                                        {!! old('title_2',$causeTitle->title_2) !!}
                                    </textarea>
                                    @error('title_2')
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
