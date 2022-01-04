@extends('layouts.admin-app')
@section('title-tab', 'Expired Subscriptions')
@section('breadcrumbs')
<h3 class="m-subheader__title ">
    Subscriptions
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
        <a href="{{ route('subscriptions.expired') }}" class="m-nav__link">
            <span class="m-nav__link-text">
                Expired Subscriptions
            </span>
        </a>
    </li>
</ul>
@endsection

@section('content')
<livewire:subscription-status-nav/>
<livewire:subscriptions-table :status="3"/>
@endsection
