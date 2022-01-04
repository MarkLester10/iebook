@extends('layouts.app')


@section('content')
<section class="hero hero-start py-12 flex items-center justify-center">
    <div class="app__container grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
      <div class="w-full bg-white py-16 px-6 md:px-12">
        <div class="app__flexbox flex-col gap-8">
            @if (session()->has('message'))
             <div class="mb-4 w-full">
                <div class="app__msg--success">
                  <small class="flex space-x-4 items-center justify-center">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                      <span>{{ session('message') }}</span>
                    </small>
                </div>
              </div>
              @endif
            <h1 class="app__subtitle uppercase">Personal Information</h1>
            <div class="text-center">
                <img src="{{auth()->user()->avatar()}}" class="w-44 h-44 mx-auto rounded-full object-cover" alt="{{ auth()->user()->getFullName() }}">
                <small class="mt-4 block text-gray-500">Date Registered: {{ auth()->user()->created_at }}</small>
                <a class="text-red-500 mt-4 flex items-center space-x-2 justify-center" href="{{ route('user.logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <span> {{ __('Logout') }}</span>
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </a>

             <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="hidden">
                 @csrf
             </form>
            </div>
        </div>
        <div class="app__divider w-full my-8"></div>
        <livewire:profile-update/>
        <div class="app__divider w-full my-8 mt-16 block"></div>
        <h1 class="app__subtitle uppercase text-center">Update Password</h1>
        <livewire:password-update/>
      </div>

      <div class="w-full bg-white py-16 px-12 md:col-span-2">
        <div class="flex gap-6 md:gap-10 flex-col md:flex-row">
            <div class="ring-2  {{ auth()->user()->is_premium ? 'ring-green-200' : 'ring-yellow-200' }} ring-offset-2 w-full p-6 rounded-lg  {{ auth()->user()->is_premium ? 'bg-green-100' : 'bg-yellow-100' }}">
                <h1 class="flex items-center justify-between app__subtitle {{ auth()->user()->is_premium ? 'text-green-500' : 'text-yellow-500' }}">
                   <span>
                    {{ auth()->user()->is_premium ? 'Premium' : 'Basic' }}
                   </span>
                   @if(!auth()->user()->is_premium)
                   <small>
                       {{ auth()->user()->search_limit }}
                   </small>
                   @endif
                </h1>
                <div class="flex items-center justify-between">
                    <small>Account Type</small>
                    @if(!auth()->user()->is_premium)
                    <small>Search Limit</small>
                    @endif
                </div>
            </div>
            <div class="ring-2 ring-offset-2 ring-blue-200 w-full p-6 rounded-lg bg-blue-100">
                <h1 class="app__subtitle text-blue-500">{{ auth()->user()->subscriptions()->count() }}</h1>
                <small>Total Subscriptions</small>
            </div>
            <div class="ring-2 ring-offset-2 ring-gray-200 w-full p-6 rounded-lg bg-gray-100">
                <h1 class="app__subtitle text-gray-500">
                    {{ $currentSubscription ? $currentSubscription->getExpirationDate() :'---' }}
                </h1>
                <small>Active Subscription Expiration Date</small>
            </div>
        </div>

        <hr class="block my-12">

        <h1 class="app__subtitle uppercase text-[16px]">Subscription History</h1>

        <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col mt-12">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr class="whitespace-nowrap">
                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                  #
                </th>
                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                  Code
                </th>

                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>

                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                  Remarks
                </th>

                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                  Start Date
                </th>
                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                  Expiration Date
                </th>
                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                  Date Placed
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($subscriptions as $subscription)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ ($subscriptions->currentpage()-1) * $subscriptions->perpage() + $loop->index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                          <div class=" font-medium text-gray-900">
                            {{ $subscription->code }}
                          </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($subscription->status == 1)
                      <span class="p-2 inline-flex text-[12px] leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                      </span>
                         @elseif($subscription->status == 0)
                      <span class="p-2 inline-flex text-[12px] leading-5 font-semibold rounded-full bg-gray-100 text-gray-500">
                        Pending
                      </span>
                        @elseif($subscription->status == 3)
                        <span class="p-2 inline-flex text-[12px] leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-500">
                            Expired
                          </span>
                        @else
                      <span class="p-2 inline-flex text-[12px] leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Denied
                      </span>
                      @endif
                    </td>
                    <td class="px-6 py-4 text-[14px]  whitespace-nowrap text-gray-500">
                        {{ $subscription->remarks ?? '---' }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap  text-gray-500">
                        {{ $subscription->getStartDate() }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap  text-gray-500">
                        {{ $subscription->getExpirationDate() }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap  text-gray-500">
                        {{ $subscription->created_at }}
                    </td>
                  </tr>
                @empty
                <tr class="text-center">
                    <td colspan="7" class="px-6 py-4 whitespace-nowrap">
                            No Subscriptions Found.
                    </td>
                  </tr>
                @endforelse

            </tbody>
          </table>
        </div>
        {{ $subscriptions->links() }}
      </div>
    </div>
  </div>


      </div>

    </div>
</section>
@endsection
<x-subscription-modal/>
