@extends('layouts.app')

@section('content')


<section class="hero py-12 flex items-center justify-center">
    <div class="app__container">
      <form  method="POST" action="{{ route('password.update') }}" class="w-full md:w-6/12 xl:w-4/12 mx-auto bg-white py-16 px-6 md:px-12">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="app__flexbox flex-col gap-8">
          <h1 class="app__subtitle uppercase">Reset password</h1>
          <small class="em__grey"
            >Please fill in the following fields below.</small
          >
        </div>
        @if ($errors->any())
        <div class="mt-12">
            <div class="app__msg--error">
              <small>{{ $errors->first() }}</small>
            </div>
          </div>
        @endif
        <div class="mt-8">

          <input
            autocomplete="off"
            type="text"
            placeholder="Email"
            required
            name="email"
            class="p-6 mt-6"
            value="{{ $email ?? old('email') }}"
          />
          <input
            autocomplete="off"
            type="password"
            placeholder="Password"
            name="password"
            class="p-6 mt-6"
            required

          />
          <input
            autocomplete="off"
            type="password"
            placeholder="Confirm Password"
            name="password_confirmation"
            class="p-6 mt-6"
            required

          />
          <button type="submit" class="app__btn-primary mt-8 w-full">
            Reset Password
          </button>
          <small class="em__grey block mt-12 text-center"
            >Remember your password?
            <a href="{{ route('login') }}" class="em__secondary underline"
              >Login</a
            ></small
          >
        </div>
      </form>
    </div>
  </section>
@endsection
