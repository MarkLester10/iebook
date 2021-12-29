<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:type" content="website" />
    <meta property="og:locale" content="tl_PH" />
    <meta
      property="og:image"
      content="{{ asset('imgs/logo_v2.png') }}"
    />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:site_name" content="IE BOOK" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta
      property="og:title"
      content="IE BOOK"
    />
    <meta
      property="og:description"
      content="IE BOOK | Search exclusive Industrial Engineering Terms. IE BOOK is an Online Library For Professional and Future Industrial Engineers"
    />
    <meta name="twitter:card" content="summary_large_image" />
    <meta
      property="twitter:image"
      content="{{ asset('imgs/logo_v2.png') }}"
    />

    <meta
      name="twitter:description"
      content="IE BOOK | Search exclusive Industrial Engineering Terms. IE BOOK is an Online Library For Professional and Future Industrial Engineers"
    />
    <meta name="twitter:title" content="IE BOOK" />
    <meta name="author" content="IE BOOK" />
    <meta
      name="keywords"
      content="IE BOOK, IE Terms, industrial engineering terms, industrial engineers, industrial terms"
    />
    <meta
      name="description"
      content="IE BOOK | Search exclusive Industrial Engineering Terms. IE BOOK is an Online Library For Professional and Future Industrial Engineers"
    />
    <meta
      name="thumbnail"
      content="{{ asset('imgs/logo_v2.png') }}"
    />


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <!-- Styles -->
    @notifyCss
    @livewireStyles
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="{{ asset('/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>

    <header id="header">
        <div class="app__container">
          <nav class="main__nav">
            <div class="logo">
              <a href="/">
                <img
                  src="{{ asset('imgs/logo_v2.png') }}"
                  class="w-32 md:w-48"
                  alt=""
                />
              </a>
            </div>

            <ul class="nav__controls">
                @auth
                <li>
                    <a href="{{ route('user.profile') }}">
                      <svg
                        class="w-12 h-12"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                        ></path>
                      </svg>
                    </a>
                  </li>
                  <li class="cart">
                    <a href="{{ route('home') }}">
                      <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </a>
                  </li>
                @endauth

                @guest
                <li>
                    <a href="{{ route('login') }}">
                      Login
                    </a>
                  </li>
                  <li class="cart">
                    <a href="{{ route('register') }}">
                     Sign Up
                    </a>
                  </li>
                @endguest
            </ul>
          </nav>
        </div>
    </header>


    @yield('content')


    <footer class="app__footer">
        <div class="app__container">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 py-8">
            <div>
              <img src="{{ asset('imgs/logo_v2.png') }}" style="width:100px" alt="">
              <p class="para mt-8">
                 Online Library For Professional and Future Industrial Engineers
              </p>
          </div>
            <div class="flex flex-col space-y-6 md:space-y-12 py-12 md:py-0 md:pb-0 md:px-12 border-t md:border-t-0 md:border-r md:border-l">
              <h1 class="para em__primary">Quick Links</h1>
              <ul class="space-y-4">
                <li>
                  <a href="{{ route('user.profile') }}">Account</a>
                </li>
                <li>
                  <a href="{{ route('home') }}">Search</a>
                </li>
              </ul>
            </div>
            <div
              class="flex flex-col items-start space-y-6 md:space-y-12"
            >
              <a href="#" target="_blank">
                <img
                  class="w-12"
                  src="{{ asset('imgs/siteicons/facebook.svg') }}"
                  alt="Facebook"
                />
              </a>
              <div class="flex flex-col space-y-4">
                <h1 class="para">&COPY;{{ date('Y') }} {{ config('app.name') }}</h1>
              </div>
            </div>
          </div>
        </div>
      </footer>
    <x:notify-messages />
    @livewireScripts
    @notifyJs
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
