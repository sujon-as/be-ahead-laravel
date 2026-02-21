@extends('admin_master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit FAQ </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/faq-titles')}}">All FAQ
                                </a></li>
                            <li class="breadcrumb-item active">Edit FAQ </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Edit FAQ </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('faqs.update',$faq->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="question">Question <span class="required">*</span></label>
                                    <input
                                        type="text"
                                        name="question"
                                        class="form-control"
                                        id="question"
                                        placeholder="Question"
                                        required=""
                                        value="{{old('question',$faq->question)}}"
                                    >
                                    @error('question')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="answer">Answer <span class="required">*</span></label>
                                    <textarea
                                        class="form-control"
                                        required=""
                                        name="answer">
                                    {!! old('answer',$faq->answer) !!}
                                </textarea>
                                    @error('answer')
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
