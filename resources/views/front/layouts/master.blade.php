<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Be aHand Charity Foundation')</title>
    @include('front.layouts.partials.css')
</head>
<body>
<div class="wrapper">
    {{--
    <div id="preloader" class="preloader">
        <div id="pre" class="preloader_container"><div class="preloader_disabler btn btn-default">Disable Preloader</div></div>
    </div>
    --}}
    @include('front.layouts.partials.header')

    @yield('content')

    @include('front.layouts.partials.footer')

    <a class="scrollToHome" href="#"><i class="fa fa-home"></i></a>
</div>
@include('front.layouts.partials.js')

<script>
    $(function () {
        $('#summernote').summernote();

        var base_url = "{{url('/')}}";
        localStorage.setItem('base_url', base_url);

    })
</script>

<script src="{{ asset('custom/toastr.js') }}"></script>

@if(Session::has('message'))
    @toastr("{{ Session::get('message') }}")
@endif

@stack('scripts')
</body>
</html>
