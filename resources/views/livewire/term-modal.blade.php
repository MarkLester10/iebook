<div class="modal @if($currentTerm) active @endif" id="termModal">
    @if($currentTerm)
      <div class="md:w-8/12 w-11/12 mx-auto bg-white">
          <div class="p-6 md:p-12 mt-28 flex md:flex-row flex-col gap-10">
              <div class="flex-1">
                @if($currentTerm['image_link'])
                  <img src="{{ $currentTerm['image_link'] }}" class="w-full object-cover" alt="">
                @else
                  <img src="{{ $currentTerm['image'] ? asset('storage/term_images/' . $currentTerm['image']) : asset('imgs/logo_v2.png') }}" class="w-full object-cover" alt="">
                @endif
              </div>
              <div class="flex-1">
                  <h1 class="app__subtitle">{{ $currentTerm['term'] }}</h1>
                  <p class="font-light normal-case mt-4 md:text-[20px]">
                      {{ strip_tags($currentTerm['description']) }}
                  </p>
              </div>
          </div>
          <div class="bg-gray-100 text-right py-8 px-4 mt-4">
              <button class="app__btn-primary" wire:click="closeReadMoreModal">Close</button>
          </div>
      </div>
    @endif
</div>
