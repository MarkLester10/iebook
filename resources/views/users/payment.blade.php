@extends('layouts.app')


@section('content')
<section class="shipping__information hero">
    <div class="w-full px-4 md:w-5/12">
      <form action="{{ route('account.upgrade') }}" method="POST" class="bg-white py-16 px-4 md:px-12" enctype="multipart/form-data">
          @csrf
        <div class="flex flex-col md:flex-row gap-24 justify-between">
          <!-- Shipping Information -->
          <div class="main flex-1">
            <header class="main__header">
              <div class="logo text-center pb-12">
                <h1 class="app__subtitle">You’re almost there! Complete your order</h1>
              </div>
            </header>

            <div class="sidebar flex-1 border p-8 rounded-md">
              <ul class="order__list py-8">
                <li class="order__list--item">
                  <h6 class="em__grey order__list--item--name"
                    >Upgrade to Premium Account - 1 Month Plan</h6
                  >
                  <h6 class="order__list--item--price"
                    >&#8369; 150.00</h6
                  >
                </li>
                <li class="order__list--item">
                  <h6 class="em__grey order__list--item--name"
                    >Basic + Voice Search</h6
                  >
                  <h6 class="order__list--item--price"
                    >FREE</h6
                  >
                </li>
                <li class="order__list--item">
                  <h6 class="em__grey order__list--item--name"
                    >Unlimited Search</h6
                  >
                  <h6 class="order__list--item--price"
                    >FREE</h6
                  >
                </li>
              </ul>
              <div class="app__divider-2"></div>
              <div class="flex flex-col gap-4 py-8">
                <div class="space-between">
                  <h6 class="order__subtotal--title">Subtotal </h6>
                  <h6 class="order__subtotal">&#8369; 150.00</h6>
                </div>
              </div>
              <div class="app__divider-2"></div>
              <div class="space-between py-8 order-total">
                <small class="order__total--title">Total</small>
                <small class="order__total">&#8369; 150.00</small>
              </div>
            </div>

            <!-- Contact Information -->
            <div class="contact__information mt-16">
              <div class="contact__information--content">
                <div class="flex gap-6 md:gap-12">
                  <small class="em__grey">Account Name</small>
                  <div class="space-between flex-1">
                    <small
                      >{{ auth()->user()->getFullName() }}</small
                    >

                  </div>
                </div>
                <div class="app__divider-2"></div>
                <div class="flex gap-6 md:gap-12">
                  <small class="em__grey">Email</small>
                  <div class="space-between flex-1">
                    <small>{{ auth()->user()->email }}</small>

                  </div>
                </div>
                <div class="app__divider-2"></div>
                <div class="flex gap-6 md:gap-12">
                  <small class="em__grey">Subscription Type</small>
                  <div class="space-between flex-1">
                    <small>Premium - Expires in {{ Carbon\Carbon::parse(Carbon\Carbon::now()->addMonth(1))->isoFormat('MMMM Do YYYY') }}</small>

                  </div>
                </div>
              </div>
            </div>

            <!-- Payment Method -->
            <div class="payment__method">
              <h1>Payment</h1>

              <div class="payment__method--item p-4 mt-6">
                <input
                  class="p-2"
                  type="radio"
                  name="payment_method"
                  value="COD"
                  id="GCASH"
                    checked="checked"
                />
                <div class="flex items-center justify-between w-full">
                <label for="GCASH">
                  <img
                  class="w-36"
                  src="{{ asset('imgs/siteicons/gcash.png') }}"
                  alt="Gcash"
                />
                </label>
                <label>
                 <small>
                  GCASH NO. <strong>0945 xxxx xxx</strong>
                 </small>
              </label>
              </div>
              </div>



              <input type="file" id="proof" class="hidden" name="proof_of_payment" onchange="displayImage(this, '#proof-preview')">
              <div id="uploadHandler">
                <div  class="border-4 @error('proof_of_payment') border-red-500 @else border-gray-400 @enderror  border-dashed p-8 mt-6 flex items-center justify-between">
                  <label for="proof" class="flex items-center justify-center space-x-8 cursor-pointer w-full">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                   <span>GCASH Receipt</span>
                  </label>
                  <div class="rounded-md h-32 overflow-hidden border-2 p-4 flex items-center w-full cursor-pointer" id="por">
                    <img src="#" class="w-full object-cover" alt="" id="proof-preview">
                  </div>
                </div>
              </div>

              @error('proof_of_payment')
              <div class="app__msg--error mt-4">
                <small>{{ $message }}</small>
              </div>
              @enderror

            </div>

            <div class="form__actions">
              <div class="flex items-center gap-2">
                <svg
                  class="w-6 h-6 em__secondary"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"
                  ></path>
                </svg>
                <a href="{{ route('user.profile') }}" class="em__secondary"
                  >Return to Account</a
                >
              </div>
              <!-- this will become button type of submit -->
              <button type="submit" class="app__btn-primary"
                >Complete Order</
              >
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
  function displayImage(e, display) {
if (e.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
document.querySelector(display).setAttribute('src', e.target.result);
}
reader.readAsDataURL(e.files[0]);
}
$('#por').show();
}
</script>
@endpush
