@extends('layouts.admin-single')


@section('admin-login')

<div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Sign In To Admin
        </h3>
    </div>
    <form class="m-login__form m-form" method="POST" action="{{ route('admin.login') }}">
        @csrf
        @if(session('status'))
        ​<div class="m-alert m-alert--outline alert alert-danger alert-dismissible" role="alert">	<span>{{ session('status') }}</span>
        </div>
        @endif
        <div class="form-group m-form__group">
            <input class="form-control m-input"  type="text" placeholder="Email" name="email"
            value="{{ old('email')}}"
            autocomplete="off" required >
        </div>
        <div class="form-group m-form__group">
            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" required>
        </div>
        <div class="row m-login__form-sub">
            <div class="col m--align-left m-login__form-left">
                <label class="m-checkbox  m-checkbox--focus">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''}}>
                    Remember me
                    <span></span>
                </label>
            </div>

            @if (Route::has('password.request'))
            <div class="col m--align-right m-login__form-right">
                <a href="{{ route('admin.password.request') }}" class="m-link">
                    Forgot Password ?
                </a>
            </div>
        @endif
        </div>
        <div class="m-login__form-action">
            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" >
                Sign In
            </button>
        </div>
    </form>
</div>
@endsection








