@extends('admin_master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/settings')}}">Settings</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Settings</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('settings-app') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="site_name">Site name <span class="required">*</span></label>
                                <input type="text" name="site_name" class="form-control" id="site_name"
                                    placeholder="Site name"
                                    value="{{old('site_name', ($setting && $setting->site_name) ? $setting->site_name : "")}}">
                                @error('site_name')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address <span class="required">*</span></label>
                                <input type="text" name="address" class="form-control" id="address"
                                    placeholder="Address"
                                    value="{{old('address', ($setting && $setting->address) ? $setting->address : "")}}"
                                >
                                @error('address')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="welcome_msg">Welcome Message <span class="required">*</span></label>
                                <input type="text" name="welcome_msg" class="form-control" id="welcome_msg"
                                    placeholder="Address"
                                    value="{{old('welcome_msg', ($setting && $setting->welcome_msg) ? $setting->welcome_msg : "")}}"
                                >
                                @error('welcome_msg')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span class="required">*</span></label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Email"
                                    value="{{old('email', ($setting && $setting->email) ? $setting->email : "")}}"
                                >
                                @error('email')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <span class="required">*</span></label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="Phone"
                                    value="{{old('phone', ($setting && $setting->phone) ? $setting->phone : "")}}"
                                >
                                @error('phone')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="footer_txt">Footer Text <span class="required">*</span></label>
                                <input type="text" name="footer_txt" class="form-control" id="footer_txt"
                                    placeholder="Phone"
                                    value="{{old('footer_txt', ($setting && $setting->footer_txt) ? $setting->footer_txt : "")}}"
                                >
                                @error('footer_txt')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="copyright_mgs">Copyright Message <span class="required">*</span></label>
                                <input type="text" name="copyright_mgs" class="form-control" id="copyright_mgs"
                                    placeholder="Copyright Message"
                                    value="{{old('copyright_mgs', ($setting && $setting->copyright_mgs) ? $setting->copyright_mgs : "")}}"
                                >
                                @error('copyright_mgs')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">Facebook <span class="required">*</span></label>
                                <input type="text" name="facebook" class="form-control" id="facebook"
                                       placeholder="Facebook"
                                       value="{{old('facebook', $setting ? $setting->facebook : "")}}">
                                @error('facebook')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rss_feed">RSS Feed <span class="required">*</span></label>
                                <input type="text" name="rss_feed" class="form-control" id="rss_feed"
                                       placeholder="RSS Feed"
                                       value="{{old('rss_feed', ($setting && $setting->rss_feed) ? $setting->rss_feed : "")}}">
                                @error('rss_feed')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="google_plus">Google Plus <span class="required">*</span></label>
                                <input type="text" name="google_plus" class="form-control" id="google_plus"
                                       placeholder="Google Plus"
                                       value="{{old('google_plus', ($setting && $setting->google_plus) ? $setting->google_plus : "")}}">
                                @error('google_plus')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pinterest">Pinterest <span class="required">*</span></label>
                                <input type="text" name="pinterest" class="form-control" id="pinterest"
                                       placeholder="Pinterest"
                                       value="{{old('pinterest', ($setting && $setting->pinterest) ? $setting->pinterest : "")}}">
                                @error('pinterest')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram">Instagram <span class="required">*</span></label>
                                <input type="text" name="instagram" class="form-control" id="instagram"
                                       placeholder="Instagram"
                                       value="{{old('instagram', ($setting && $setting->instagram) ? $setting->instagram : "")}}">
                                @error('instagram')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="logo">Logo <span class="required">*</span></label>
                                <input
                                    name="logo"
                                    type="file"
                                    id="logo"
                                    accept="image/*"
                                    class="dropify"
                                    data-height="150"
                                    data-default-file="{{ URL::to($setting ? $setting->logo : '') }}"
                                />
                                @error('logo')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fav_icon">Fav Icon <span class="required">*</span></label>
                                <input
                                    name="fav_icon"
                                    type="file"
                                    id="fav_icon"
                                    accept="image/*,.ico"
                                    class="dropify"
                                    data-height="150"
                                    data-allowed-file-extensions="ico png jpg jpeg svg"
                                    data-default-file="{{ URL::to($setting ? $setting->fav_icon : '') }}"
                                />
                                @error('fav_icon')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group w-100">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </div>
                    <!-- /.card-body -->
            </form>
        </div>
    </section>
</div>
@endsection
