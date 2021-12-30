@extends('layouts.app')

@section('content')
<section class="hero hero-start uppercase">
    <div class="app__container">
        <div class="w-full md:w-7/12 mx-auto py-16 mt-8 md:px-12">
            <div class="relative">
                <input type="text" class="py-6 px-4 " placeholder="Search by typing or using voice recognition">
                <svg class="hidden md:block absolute top-4 right-4 w-12 h-12 text-red-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="mt-8 flex items-center flex-col md:flex-row justify-between gap-4 md:gap-12">
                <button class="app__btn-t w-full flex items-center justify-center space-x-2">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    <span>Search</span>
                </button>
                <button class="app__btn-t w-full flex items-center justify-center space-x-2">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd"></path></svg>
                    <span>Voice Recognition</span>
                </button>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
  </section>
@endsection

@if(auth()->user()->search_limit == 0)
<div class="modal active">
    <div class="w-11/12 md:w-3/12 bg-white relative">
        <svg class="w-36 h-36 absolute -top-16 left-1/2 transform -translate-x-1/2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
    <div class="text-center px-4 mt-28">
        <h1 class="app__subtitle">
            Upgrade Your Free Account!
          </h1>
          <p class="font-300 mt-6">Looks like you reached your free account search limit. <br> Upgrade your account for as low as &#8369;150 to enjoy unlimited search.</p>
          <a
          href="#"
          class="my-10 app__btn-primary shadow-md"
        >
          <div class="flex items-center space-x-2">
            <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"></path></svg>
            <span>Upgrade My Account</span>
          </div>
        </a>
    </div>
    <div class="bg-gray-100 text-center py-8 px-4 mt-4">
        <p class="font-300 flex items-center space-x-2 justify-center">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Quick Tip</span>
        </p>
        <small class="para mt-2">It takes less than 1 minute to upgrade your account then you can enjoy unlimited search and access to exclusive industrial engineering terminologies.</small>
    </div>
    </div>
 </div>
@endif


