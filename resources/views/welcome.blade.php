@extends('layouts.app')

@section('content')

<section class="hero text-white uppercase">
    <div class="app__container">
      <div class="hero__content">
        <h1 class="app__title">
          Search Exclusive Industrial Engineering Terms
        </h1>
        <h2 class="app__subtitle">
          <span class="em__secondary">We Provide</span><br />
          1000+ words for industrial engineers
        </h2>
        <h3>
         Skyrocket your career.
          <span class="em__secondary"
            ><a href="{{ route('register') }}" class="hover:underline">Sign In Now</a></span
          >
        </h3>
      </div>
    </div>
    <div class="overlay"></div>
  </section>

    <!-- Categories -->
    <section class="categories">
      <div class="app__container">
        <h1 class="app__subtitle">Service Features</h1>
        <div
          class=" w-11/12 lg:w-9/12 mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 mt-20"
        >

        <div class="bg-gray-50 rounded-md flex items-center flex-col py-20 md:py-44 px-12 cursor-pointer">
          <svg class="w-32 h-32 hover:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd"></path></svg>
          <h1 class="app__subtitle uppercase em__secondary mt-16">Voice Search</h1>
          <p class="py-4 font-300 text-center">Search easily with our voice recognition service.</p>
        </div>

        <div class="bg-gray-50 rounded-md flex items-center flex-col py-20 md:py-44 px-12 cursor-pointer">
          <svg class="w-32 h-32 hover:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z"></path><path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd"></path></svg>
          <h1 class="app__subtitle uppercase em__secondary mt-16">1000+ Words</h1>
          <p class="py-4 font-300 text-center">Enjoy our thousands of Industrial Engineering Terminologies.</p>
        </div>

        <div class="bg-gray-50 rounded-md flex items-center flex-col py-20 md:py-44 px-12 cursor-pointer">
          <svg class="w-32 h-32 hover:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
          <h1 class="app__subtitle uppercase em__secondary mt-16">Reliable Source</h1>
          <p class="py-4 font-300 text-center">Get unlimited access to terminologies from reliable source from books and professionals.
            </p>
        </div>



            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- Beer of the Week -->
    <section class="beer__of__the__week">
      <div class="app__container">
        <div class="beer__model">
          <div class="beer__img">
            <img
              class="w-full h-full object-cover"
              src="{{ $termOfTheDay->image ? asset('storage/term_images/' . $termOfTheDay->image) : asset('imgs/logo_v2.png') }}"
              alt="Fishbone Diagram"
            />
          </div>
          <div class="beer__description">
            <h1 class="app__subtitle uppercase">{{ $termOfTheDay->term }}</h1>
            <p class="py-4 font-300 em__secondary">Word Of The Day</p>
            <p class="mt-16 font-300">
             {{ strip_tags($termOfTheDay->description)  }}
            </p>
          </div>
        </div>
      </div>
    </section>

  <!-- Store Address -->
  <section class="store__address">
    <div class="app__container">
      <div class="store__details">
        <h1 class="app__subtitle uppercase">
          <span class="em__secondary">Subscription Price</span>
        </h1>

        <div class="flex items-center gap-20 mb-8">
          <p class="font-300 pt-12 text-left">
            Basic Account <br> <br>
            - Free <br>
            - Limited to 20 searches only <br>
            - Basic Search <br>
          </p>
          <p class="font-300 pt-12 text-left">
            Premium Account <br> <br>
            - &#8369; 150 / Month <br>
            - Unlimited search<br>
            - Basic Search + Voice Recognition <br>
          </p>
        </div>
        <hr>
        <p class="font-300 pt-12">
          You must create an account to subscribe.<br>
          It takes less than 1 minute to Signup, <br> then you can enjoy <span class="em__secondary">Unlimited Word Search</span>.
         </p>
        <a
          href="#"
          class="mt-16 app__btn-primary shadow-md"
        >
          <div class="flex items-center space-x-2">
            <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"></path></svg>
            <span>Sign In and Subscribe</span>
          </div>
        </a>
      </div>
    </div>
  </section>


@endsection
