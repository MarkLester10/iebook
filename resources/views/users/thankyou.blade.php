@extends('layouts.app')


@section('content')
<section class="shipping__information hero">
    <div class="w-full px-4 md:w-5/12">
      <form action="{{ route('account.upgrade') }}" method="POST" class="bg-white py-16 px-4 md:px-12" enctype="multipart/form-data">
          @csrf
        <div class="flex flex-col md:flex-row gap-24 justify-between">
          <!-- Shipping Information -->
          <div class="main flex-1">
            <div class="mt-16 flex gap-6">
                <div class="flex">
                  <svg
                    class="w-24 h-24 text-green-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="1"
                      d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                    ></path>
                  </svg>
                </div>

                <div class="order__number">
                  <p class="para">Order Code <strong class="font-bold">{{ $subscription->code }}</strong></p>
                  <h1 class="app__subtitle">Thank You!</h1>
                  <small class="em__grey">
                    Order placed on {{ $subscription->created_at }}
                  </small>
                </div>
              </div>

              <div class="mt-16 order__confirmation">
                <h3>Subscription Order Successfully Placed</h3>
                <p class="para block mt-6"
                  >Search exclusive Industrial Engineering Terms. IE BOOK is an Online Library For Professional and Future Industrial Engineers. <br> <br> Search the online dictionary of industrial engineers with over 12,000 entries that have been compiled from the latest edition of the publication Industrial Engineering Terminology.</p>
                <p class="para block mt-6"
                  >Help us improve our app. Share this hack with your IE friends.</p>

                <div class="mt-6 bg-gray-100 p-8 border-l-8 border-red-500">
                    <h1 class="font-medium "
                    >Please Note:
                    </h1>
                    <p class="para block mt-4">Your subscription order is subject for approval. Please give us some time to review your payment details and wait for our confirmation on your subscription.</p>
                </div>
              </div>

            <div class="form__actions">
                <div></div>
              <a href="{{ route('user.profile') }}" class="app__btn-primary"
                >Return to account</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection


