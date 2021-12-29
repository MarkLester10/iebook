@extends('layouts.admin-single')

@section('admin-login')
<div class="m-login__forget-password" style="display:block;">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Forgotten Password ?
        </h3>
        <div class="m-login__desc">
            Enter your email to reset your password:
        </div>
    </div>

        <form class="m-login__form m-form" method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            @if(session('status'))
            ​<div class="m-alert m-alert--outline alert alert-success alert-dismissible" role="alert"><span>{{ session('status') }}</span>
            </div>
            @endif
            @if($errors->any())
            ​<div class="m-alert m-alert--outline alert alert-danger alert-dismissible" role="alert">	<span>{{ $errors->first() }}</span>
            </div>
            @endif
        <div class="form-group m-form__group">
            <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off" required>
        </div>
        <div class="m-login__form-action">
            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">
                Request
            </button>
            &nbsp;&nbsp;
            <a href="{{ route('admin.login') }}" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
