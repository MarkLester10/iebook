@extends('layouts.app')


@section('content')
<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{auth()->user()->avatar()}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h4>
                      <p class="text-secondary mb-1">{{ auth()->user()->email }}</p>
                      <p class="text-muted font-size-sm">Date Registered: {{ auth()->user()->created_at }}</p>
                      {{-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> --}}
                    </div>
                  </div>
                </div>
              </div>

              <livewire:profile-update/>
            <livewire:password-update/>

            </div>
            <div class="col-md-8">

            </div>
          </div>
        </div>
    </div>
@endsection
