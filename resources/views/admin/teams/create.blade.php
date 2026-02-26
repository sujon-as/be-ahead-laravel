@extends('admin_master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add teams</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/teams')}}">All teams</a></li>
                        <li class="breadcrumb-item active">Add teams</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add teams</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('teams.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">name <span class="required">*</span></label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    id="name"
                                    placeholder="name"
                                    required=""
                                    value="{{ old('name') }}"
                                >
                                @error('name')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="designation">designation <span class="required">*</span></label>
                                <input
                                    type="text"
                                    name="designation"
                                    class="form-control"
                                    id="designation"
                                    placeholder="designation"
                                    required=""
                                    value="{{old('designation')}}"
                                >
                                @error('designation')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description <span class="required">*</span></label>
                                <textarea
                                    class="form-control"
                                    required=""
                                    id="description"
                                    placeholder="description"
                                    name="description">{!! old('description') !!}</textarea>
                                @error('description')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
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
