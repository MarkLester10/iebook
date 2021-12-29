@extends('layouts.app')

@section('content')
<section class="hero py-12 flex items-center justify-center">
    <div class="app__container">
      <form method="POST" action="{{ route('login') }}" class="w-full md:w-6/12 xl:w-4/12 mx-auto bg-white py-16 px-12">
        @csrf
        <div class="app__flexbox flex-col gap-8">
          <h1 class="app__subtitle uppercase">SIGN IN</h1>
          <small class="em__grey">Enter your e-mail and password.</small>
        </div>

        <div class="mt-12">
            @if ($errors->any())
            <div class="app__msg--error">
            <small>{{ $errors->first() }}</small>
            </div>
            @endif
        </div>
        <div class="mt-8">
          <input
          autocomplete="off"
          type="text"
          placeholder="Email"
          required
          value="{{ old('email') }}"
          name="email"
          class="p-6"
          />
          <div class="relative">
            <input
            autocomplete="off"
            type="password"
            placeholder="Password"
            name="password"
            required
            class="p-6 mt-6"
            />
            <small
              class="absolute right-4 top-1/2 transform -translate-y-1/2"
              style="font-size: 12px"
            >
            @if (Route::has('password.request'))
              <a
              href="{{ route('password.request') }}"
              class="em__grey hover:underline"
              >Forgot Password?</a
            >
          @endif
            </small>
          </div>
          <button type="submit" class="app__btn-primary mt-8 w-full">Login</button>
          <small class="em__grey block mt-12 text-center"
            >Dont't have an account?
            <a href="{{ route('register') }}" class="em__secondary underline"
              >Create One</a
            ></small
          >
        </div>
        <div class="app__divider-2 my-12">
          <p class="app__divider-2--text">Or login with</p>
        </div>

        <!-- Social Login -->
        <div class="app__flexbox gap-12">
          <div class="p-6 bg-gray-100 w-full">
            <a href="{{ route('login.google') }}" class="app__flexbox gap-6">
              <img
                src="{{ asset('imgs/siteicons/google.svg') }}"
                class="w-8"
                alt="Google"
              />
              <small>Google</small>
            </a>
          </div>
          <div class="p-6 bg-gray-100 w-full">
            <a href="{{ route('login.facebook') }}" class="app__flexbox gap-6">
              <img
                src="{{ asset('imgs/siteicons/facebook-login.svg') }}"
                class="w-8"
                alt="Facebook"
              />
              <small>Facebook</small>
            </a>
          </div>
        </div>
      </form>
    </div>
</section>
@endsection
