<!DOCTYPE html>
    <html lang="en" >
        <!-- begin::Head -->
        <head>
            <meta charset="utf-8" />
            <title>
              {{ config('app.name') }} | Login
            </title>
            <meta name="description" content="Latest updates and statistic charts">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
            <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
            <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
            <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
            <!--begin::Web font -->
            <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
            <script>
              WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
              });
            </script>
            <!--end::Web font -->
            <!--begin::Base Styles -->
            <link href="{{ asset('admin/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('admin/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
            <!--end::Base Styles -->

             <!--begin::Favicon -->
             <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
             <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
             <!--end::Favicon -->

             <style>

                 @media only screen and (max-width: 640px){
                    #bg-image{
                     display: none;
                 }
                 }
             </style>

        </head>
        <!-- end::Head -->
        <!-- end::Body -->
        <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
            <!-- begin:: Page -->
            <div class="m-grid m-grid--hor m-grid--root m-page">
                <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url({{ asset('admin/assets/app/media/img//bg/bg-3.jpg') }});">
                    <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                        <div class="m-login__container">
                            <div class="m-login__logo">
                                <a href="{{ url('/') }}">
                                    <img style="width:80%; margin: 0 auto;" src="{{ asset('imgs/logo.png') }}">
                                </a>
                            </div>

                            @yield('admin-login')


                        </div>
                    </div>
                </div>
            </div>
            <!-- end:: Page -->
            <!--begin::Base Scripts -->
            <script src="{{ asset('admin/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
            <script src="{{ asset('admin/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
            <!--end::Base Scripts -->
            <script>
                function togglePassword(){const t=document.getElementById("password"),e=document.getElementById("password-confirm");"password"===t.type?t.type="text":t.type="password","password"===e.type?e.type="text":e.type="password"}
            </script>
        </body>
        <!-- end::Body -->
    </html>
