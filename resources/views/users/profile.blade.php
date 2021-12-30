@extends('layouts.app')


@section('content')
<section class="hero hero-start py-12 flex items-center justify-center">
    <div class="app__container grid grid-cols-1 md:grid-cols-3 gap-10">
      <div class="w-full bg-white py-16 px-6 md:px-12">
        <div class="app__flexbox flex-col gap-8">
            @if (session()->has('message'))
             <div class="mb-4 w-full">
                <div class="app__msg--success">
                  <small class="flex space-x-4 items-center justify-center">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                      <span>{{ session('message') }}</span>
                    </small>
                </div>
              </div>
              @endif
            <h1 class="app__subtitle uppercase">Personal Information</h1>
            <div class="text-center">
                <img src="{{auth()->user()->avatar()}}" class="w-44 h-44 mx-auto rounded-full object-cover" alt="{{ auth()->user()->getFullName() }}">
                <small class="mt-4 block text-gray-500">Date Registered: {{ auth()->user()->created_at }}</small>
                <a class="text-red-500 mt-4 flex items-center space-x-2 justify-center" href="{{ route('user.logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <span> {{ __('Logout') }}</span>
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </a>

             <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="hidden">
                 @csrf
             </form>
            </div>
        </div>
        <div class="app__divider w-full my-8"></div>
        <livewire:profile-update/>
        <div class="app__divider w-full my-8 mt-16"></div>
        <h1 class="app__subtitle uppercase text-center">Update Password</h1>
        <livewire:password-update/>
      </div>

      <div class="w-full bg-white py-16 px-12 md:col-span-2 h-1/2">
      </div>

    </div>
</section>
@endsection
