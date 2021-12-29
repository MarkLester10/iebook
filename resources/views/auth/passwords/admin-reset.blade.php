@extends('layouts.admin-single')

@section('admin-login')

<div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Reset Your Password
        </h3>
    </div>
    <form class="m-login__form m-form" method="POST" action="{{ route('admin.password.update') }}">
        @csrf
        @if($errors->any())
        ​<div class="m-alert m-alert--outline alert alert-danger alert-dismissible" role="alert">	<span>{{ $errors->first() }}</span>
        </div>
        @endif
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group m-form__group">
            <input class="form-control m-input"  type="text" placeholder="Email" name="email"
            value="{{ $email ?? old('email') }}"
            autocomplete="off" required >
        </div>
        <div class="form-group m-form__group">
            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" required>
        </div>
        <div class="form-group m-form__group">
            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="password_confirmation" required>
        </div>

            @if (Route::has('password.request'))
            <div class="col mt-4">
                <a href="{{ route('admin.login') }}" class="m-link">
                    Remember Password ?
                </a>
            </div>
        @endif

        <div class="m-login__form-action">
            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" >
                Reset Password
            </button>
        </div>
    </form>
</div>
@endsection
