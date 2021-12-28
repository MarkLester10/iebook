@extends('layouts.admin-app')
@section('title-tab', 'Terms')
@section('breadcrumbs')
<h3 class="m-subheader__title ">
    Terms
</h3>
<ul class="m-subheader__breadcrumbs m-nav m-nav--inline __web-inspector-hide-shortcut__">
    <li class="m-nav__item m-nav__item--home">
        <a href="{{ route('admin.dashboard') }}" class="m-nav__link m-nav__link--icon">
            <i class="m-nav__link-icon la la-home"></i>
        </a>
    </li>
    <li class="m-nav__separator">
        -
    </li>
    <li class="m-nav__item">
        <a href="{{ route('terms.index') }}" class="m-nav__link">
            <span class="m-nav__link-text">
                Terms
            </span>
        </a>
    </li>
</ul>
@endsection

@section('content')
@if(session('message'))
<div class="m-alert m-alert--icon m-alert--outline alert alert-success" role="alert">
    <div class="m-alert__icon">
        <i class="la la-check-circle-o"></i>
    </div>
    <div class="m-alert__text">
        <strong>
            Well done!
        </strong>
         Term has been moved to archive.
    </div>
    <div class="m-alert__actions">
        {!! session('message') !!}
        <button type="button" class="btn btn-danger btn-sm m-btn m-btn--pill m-btn--wide" data-dismiss="alert" aria-label="Close">
            Dismiss
        </button>
    </div>
</div>
@endif
<livewire:terms-table/>
@endsection

@push('scripts')
<script src="{{ asset('admin/assets/demo/default/custom/components/base/bootstrap-notify.js') }}" type="text/javascript"></script>
@if(session('success'))
<script>
    $.notify({
        // options
        message: '{{ session("success") }}',
    },{
        // settings
        type: 'success',
        timer: 500,
        allow_dismiss: true,
        animate: {
            enter: 'animated bounce',
            exit: 'animated bounce'
        },
    });
</script>
@endif
@if(session('error'))
<script>
    $.notify({
        // options
        message: '{{ session("error") }}',
    },{
        // settings
        type: 'danger',
        timer: 500,
        allow_dismiss: true,
        animate: {
            enter: 'animated bounce',
            exit: 'animated bounce'
        },
    });
</script>
@endif
@endpush

