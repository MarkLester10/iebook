@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    #more {display: none;}
    #info {display: none;}
</style>
@endpush

@section('content')
<section class="hero hero-start uppercase">
    <div class="app__container">
        <livewire:search-component/>
    </div>
    <div class="overlay"></div>
  </section>
@endsection

<livewire:term-modal/>
<x-subscription-modal/>
