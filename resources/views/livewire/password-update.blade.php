<div class="my-3">
         <form wire:submit.prevent="updatePassword">
             @csrf
             @if ($errors->any())
             <div class="my-4">
                 <div class="app__msg--error">
                   <small>{{ $errors->first() }}</small>
                 </div>
               </div>
             @endif

             @if (auth()->user()->password)
            <small class="my-2 block">Current Password</small>
            <input
            autocomplete="off"
            type="password"
            placeholder="Current Password"
            required
            wire:model="currentPassword"
            class="p-6 @error('currentPassword') border-2 border-red-500 @enderror"
            />
             @endif


             <small class="my-2 block">New Password</small>
             <input
             autocomplete="off"
             type="password"
             placeholder="New Password"
             required
             wire:model="newPassword"
             class="p-6 @error('newPassword') border-2 border-red-500 @enderror"
             />

             <small class="my-2 block">Confirm Password</small>
             <input
             autocomplete="off"
             type="password"
             placeholder="Confirm Password"
             required
             wire:model="newPassword_confirmation"
             class="p-6 @error('newPassword_confirmation') border-2 border-red-500 @enderror"
             />

            <button type="submit"  class="app__btn-primary w-full mt-6">
                {{ __('Update Password') }}
            </button>

         </form>
</div>
