<meta name="description" content="{{ $settings->site_name }}"/>
<meta name="keywords" content="{{ $settings->site_name }}">
<meta name="author" content="{{ $settings->site_name }}">
<!-- css file -->
<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/all-plugins.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/theme-color.css') }}">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
<!-- Title -->
<title>{{ $settings->site_name }}</title>
<!-- Favicon -->
<link href="{{ asset($settings->favicon) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{ asset($settings->favicon) }}" sizes="128x128" rel="shortcut icon" />
<link rel="stylesheet" href="{{ asset('front/css/toastr.min.css') }}">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
