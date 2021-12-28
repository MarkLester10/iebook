<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

         <title>{{ config('app.name') }} | @yield('title-tab')</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>

            <link href="//www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" />

	        <!--begin::Base Styles -->
            <link href="{{ asset('admin/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('admin/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
            <!--end::Base Styles -->

            <!--begin::Favicon -->
            <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
            <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
            <!--end::Favicon -->

        @livewireStyles
        @stack('css')
	</head>

	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<div class="m-grid m-grid--hor m-grid--root m-page">
                @include('layouts.admin-header')

			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>

				@include('layouts.admin-aside-menu')

                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <div class="m-subheader">
                            @yield('breadcrumbs')
                    </div>

                    <div class="m-content">
                        @yield('content')
                    </div>
                </div>

			</div>
                @include('layouts.admin-footer')
		</div>


		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->


	            <!--begin::Base Scripts -->
        <script src="{{asset('admin/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{ asset('admin/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
                <!--end::Base Scripts -->


	            <!--begin::Dashboard Scripts -->
        <script src="{{ asset('admin/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="{{ asset('admin/assets/app/js/dashboard.js') }}" type="text/javascript"></script>
                <!--end::Dashboard Scripts -->

        @livewireScripts
        @stack('scripts')
        <script>
            function togglePassword(){
                const t=document.getElementById("password"),e=document.getElementById("password-confirm"),p=document.getElementById("password-new");
                t.type==="password"?t.type="text":t.type="password",e.type==="password"?e.type="text":e.type="password",p.type==="password"?p.type="text":p.type="password"}
                function displayImage(e, display) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                document.querySelector(display).setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
            }
        </script>
	</body>
</html>
