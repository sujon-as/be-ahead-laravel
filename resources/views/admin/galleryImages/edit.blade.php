@extends('admin_master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Gallery Images</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/gallery-images')}}">All Gallery Images
                                </a></li>
                            <li class="breadcrumb-item active">Edit Gallery Images</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Edit Gallery Images</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('gallery-images.update',$gallery_image->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="required">*</span></label>
                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control"
                                        id="title"
                                        placeholder="Title"
                                        required=""
                                        value="{{ old('title', $gallery_image->title) }}"
                                    >
                                    @error('title')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gallery_category_id">Select Category <span
                                            class="required">*</span></label>
                                    <select class="form-control select2bs4" name="gallery_category_id"
                                            id="gallery_category_id" required="">
                                        <option value="" selected="" disabled="">Select Category</option>
                                        @if(count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category['id'] ?? '' }}"
                                                        @if($category['id'] === $gallery_image->gallery_category_id) selected @endif>
                                                    {{ $category['title'] ?? '' }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('gallery_category_id')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Image <span class="required">*</span></label>
                                    <input
                                        name="image"
                                        type="file"
                                        id="image"
                                        accept="image/*"
                                        class="dropify"
                                        data-height="150"
                                        data-default-file="{{ URL::to($gallery_image->image ?: '') }}"
                                    />
                                    @error('image')
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
