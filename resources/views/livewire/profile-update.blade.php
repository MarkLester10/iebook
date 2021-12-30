<div class="my-3">
          <form wire:submit.prevent="updateProfile">
            @if ($errors->any())
            <div class="my-4">
                <div class="app__msg--error">
                  <small>{{ $errors->first() }}</small>
                </div>
              </div>
            @endif
            <small class="my-2 block">First Name</small>
            <input
            autocomplete="off"
            type="text"
            placeholder="First Name"
            required
            wire:model="first_name"
            class="p-6 @error('first_name') border-2 border-red-500 @enderror"
            />
            <small class="my-2 block mt-6">Last Name</small>
            <input
            autocomplete="off"
            type="text"
            placeholder="Last Name"
            required
            name="last_name"
            class="p-6 @error('last_name') border-2 border-red-500 @enderror"
            wire:model="last_name"
            />
            <small class="my-2 mt-6 block">Email</small>
            <input
            autocomplete="off"
            type="email"
            placeholder="Email"
            required
            name="email"
            class="p-6 @error('last_name') border-2 border-red-500 @enderror"
            wire:model="email"
            />
            <small class="my-2 mt-6 block">Profile Image</small>
            <input type="file" wire:model="avatar" class="p-6 border border-gray-500 @error('file') border-2 border-red-500 @enderror">


            <button type="submit" class="app__btn-primary w-full mt-6">
                <span>
                    {{ __('Update Profile') }}
                </span>
            </button>
          </form>
</div>
