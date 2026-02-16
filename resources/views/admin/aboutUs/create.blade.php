@extends('admin_master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add About Us</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/about-us')}}">All About Us</a></li>
                        <li class="breadcrumb-item active">Add About Us</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add About Us</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('about-us.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title <span class="required">*</span></label>
                                <textarea
                                    class="form-control description"
                                    required=""
                                    name="title">
                                    {!! old('title') !!}
                                </textarea>
                                @error('title')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description <span class="required">*</span></label>
                                <textarea
                                    class="form-control description"
                                    required=""
                                    name="description">
                                    {!! old('description') !!}
                                </textarea>
                                @error('description')
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
                                />
                                @error('img')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img_short_text">Image Short Text <span class="required">*</span></label>
                                <input
                                    type="text"
                                    name="img_short_text"
                                    class="form-control"
                                    id="img_short_text"
                                    placeholder="Image Short Text"
                                    required=""
                                    value="{{old('img_short_text')}}"
                                >
                                @error('img_short_text')
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
