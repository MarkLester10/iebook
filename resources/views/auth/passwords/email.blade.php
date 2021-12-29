@extends('layouts.app')

@section('content')
<section class="hero py-12 flex items-center justify-center">
    <div class="app__container">
      <form action="{{ route('password.email') }}" method="POST" class="w-full md:w-6/12 xl:w-4/12 mx-auto bg-white py-16 px-12">
        @csrf
        <div class="app__flexbox flex-col gap-8">
          <h1 class="app__subtitle uppercase">Recover Password</h1>
          <small class="em__grey"
            >Enter the email you've registered to our site, so we can help
            you.</small
          >
        </div>

        @if (session('status'))
        <div class="mt-12">
            <div class="app__msg--success">
            <small>{{ session('status') }}</small>
            </div>
          </div>
        @endif

        @error('email')
        <div class="mt-12">
            <div class="app__msg--error">
            <small> {{ $message }}</small>
            </div>
          </div>
        @enderror


        <div class="mt-8">
            <input
              type="text"
              placeholder="Email"
              required
              name="email"
              class="p-6"
            />

            <button class="app__btn-primary mt-8 w-full">Send Password Reset Link</button>
            <small class="em__grey block mt-12 text-center"
              >I remember my password.
              <a href="{{ route('login') }}" class="em__secondary underline"
                >Back to Login</a
              ></small
            >
          </div>
      </form>
    </div>
  </section>

@endsection
