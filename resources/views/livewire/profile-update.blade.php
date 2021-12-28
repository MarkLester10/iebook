<div class="my-3">
    <div class="card h-100">
        <div class="card-body">
          <h6 class="d-flex align-items-center mb-3"></i>Update Profile</h6>

          <form wire:submit.prevent="updateProfile">
            <div class="form-group">
                <label for="first_name">{{ __('First Name') }}</label>
                <div>
                    <input id="name" wire:model="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required autocomplete="first_name" autofocus>

                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="last_name">{{ __('Last Name') }}</label>
                <div>
                    <input id="name" wire:model="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="last_name" autofocus>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>

                <div>
                    <input id="email" wire:model="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="avatar">{{ __('Avatar') }}</label>

                <div>
                    <input id="avatar" wire:model="avatar" type="file" class="form-control border-0 @error('avatar') is-invalid @enderror" name="avatar"  autofocus>

                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-block w-100 btn-primary">
                        <span>
                            {{ __('Update') }}
                        </span>
                    </button>
                </div>
            </div>
          </form>

        </div>
      </div>
</div>
