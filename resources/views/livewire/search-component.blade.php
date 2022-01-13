<div class="w-full md:w-7/12 mx-auto py-16 mt-8 md:px-12">
    <form id="search-form" wire:submit.prevent="search">
        @csrf
        <div class="relative">
            <input type="text" wire:model="term" class="py-6 px-4" placeholder="Search by typing or using voice recognition" id="searchFormInput">
            <svg class="hidden md:block absolute top-4 right-4 w-12 h-12 text-red-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            @if($term != '')
            <small wire:click="clearInput" class="text-green-500 absolute top-6 md:right-16 right-6 cursor-pointer underline">Reset</small>
            @endif
            <small wire:ignore.self id="info" class="block bg-white w-full p-4 text-center my-2 text-green-500">Voice Activated: <span class="text-yellow-400">Listening...</span></small>
        </div>
        <div class="mt-4 flex items-center md:flex-row justify-between gap-4 md:gap-12">
            <button type="submit" id="submitBtn" class="app__btn-t w-full !flex items-center justify-center space-x-2" @if($term == '') disabled @endif>
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                <span>Search</span>
            </button>
            @if(auth()->user()->is_premium)
            <button wire:ignore type="button" class="app__btn-t w-full flex items-center justify-center space-x-2" id="v-button">
                <i class="fas fa-microphone text-[16px]" id="micIcon"></i>
                <span>Voice Search </span>
            </button>
            @endif
        </div>
    </form>

    @if(count($terms) > 0)
    <div class="bg-white p-6 mt-10 space-y-8 w-full">
            @foreach($terms as $item)
            <div class="border flex p-4 md:p-6 md:space-x-8 space-x-6 w-full">
                @if($item->image_link)
                <img src="{{ $item->image_link }}" class="w-28 md:w-48 h-28 md:h-48 object-cover" alt="">
                @else
                <img src="{{ $item->image ? asset('storage/term_images/' . $item->image) : asset('imgs/logo_v2.png') }}" class="w-28 md:w-48 h-28 md:h-48 object-cover" alt="">
                @endif
                <div>
                    <h1 class="subtitle__text">{{ $item->term }}</h1>
                    <p class="font-light normal-case mt-2">
                        {{ Str::limit(strip_tags($item->description), 150) }}
                    </p>
                    @if(!auth()->user()->is_premium && $item->is_premium)
                    <button class="mt-4 text-[13px] flex items-center space-x-2">
                        <span class="!text-yellow-500">Premium Word</span>
                        <svg class="!text-yellow-500 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </button>
                    @else
                    <button class="!text-green-500 underline mt-4 text-[13px]" wire:click="readMore({{ $item->id }})">Read More</button>
                    @endif
                </div>
            </div>
            @endforeach

            @if($totalTerms > $limitPerPage)
            <div class="flex justify-end">
                <button type="button" class="app__btn-primary flex items-center space-x-3" wire:click="loadMore">
                    <div wire:loading wire:target="loadMore" style="border-top-color:transparent" class="w-8 h-8 border-4 border-red-300 border-solid rounded-full mx-auto animate-spin">
                    </div>
                    <span wire:loading.remove>Load More</span>
                    <span wire:loading wire:target="loadMore">Loading more...</span>
                    </button>
            </div>
            @else
            <div class="text-center p-8">
                <h1 class="subtitle__text em__grey">Nothing Follows</h1>
            </div>
            @endif
    </div>
    @endif


    @if($noFound)
        <div class="bg-white p-6 mt-10 space-y-8 max-h-[800px] overflow-y-auto w-full">
            <div class="border text-center p-8">
                    <h1 class="subtitle__text">No Results.</h1>
                    <p class="font-light mt-2">Try narrowing your search.</p>
            </div>
    </div>
    @endif

    <div class="bg-white p-6 mt-10 space-y-8 overflow-y-auto w-full" wire:loading wire:target="search" wire:loading.delay.longest>
        <div class="border shadow rounded-md p-4 w-full mx-auto">
            <div class="animate-pulse flex md:space-x-8 space-x-6">
              <div class="bg-gray-300 w-28 md:w-48 h-28 md:h-48 object-cover"></div>
              <div class="flex-1 space-y-6 py-1">
                <div class="h-4 bg-gray-300 rounded"></div>
                <div class="space-y-3">
                  <div class="grid grid-cols-3 gap-4">
                    <div class="h-4 bg-gray-300 rounded col-span-2"></div>
                    <div class="h-4 bg-gray-300 rounded col-span-1"></div>
                  </div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-6 w-24 !mt-6 bg-gray-300 rounded"></div>
                </div>
              </div>
            </div>
        </div>
        <div class="border shadow rounded-md p-4 w-full mx-auto">
            <div class="animate-pulse flex md:space-x-8 space-x-6">
              <div class="bg-gray-300 w-28 md:w-48 h-28 md:h-48 object-cover"></div>
              <div class="flex-1 space-y-6 py-1">
                <div class="h-4 bg-gray-300 rounded"></div>
                <div class="space-y-3">
                  <div class="grid grid-cols-3 gap-4">
                    <div class="h-4 bg-gray-300 rounded col-span-2"></div>
                    <div class="h-4 bg-gray-300 rounded col-span-1"></div>
                  </div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-6 w-24 !mt-6 bg-gray-300 rounded"></div>
                </div>
              </div>
            </div>
        </div>
        <div class="border shadow rounded-md p-4 w-full mx-auto">
            <div class="animate-pulse flex md:space-x-8 space-x-6">
              <div class="bg-gray-300 w-28 md:w-48 h-28 md:h-48 object-cover"></div>
              <div class="flex-1 space-y-6 py-1">
                <div class="h-4 bg-gray-300 rounded"></div>
                <div class="space-y-3">
                  <div class="grid grid-cols-3 gap-4">
                    <div class="h-4 bg-gray-300 rounded col-span-2"></div>
                    <div class="h-4 bg-gray-300 rounded col-span-1"></div>
                  </div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-6 w-24 !mt-6 bg-gray-300 rounded"></div>
                </div>
              </div>
            </div>
        </div>
        <div class="border shadow rounded-md p-4 w-full mx-auto">
            <div class="animate-pulse flex md:space-x-8 space-x-6">
              <div class="bg-gray-300 w-28 md:w-48 h-28 md:h-48 object-cover"></div>
              <div class="flex-1 space-y-6 py-1">
                <div class="h-4 bg-gray-300 rounded"></div>
                <div class="space-y-3">
                  <div class="grid grid-cols-3 gap-4">
                    <div class="h-4 bg-gray-300 rounded col-span-2"></div>
                    <div class="h-4 bg-gray-300 rounded col-span-1"></div>
                  </div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-6 w-24 !mt-6 bg-gray-300 rounded"></div>
                </div>
              </div>
            </div>
        </div>
        <div class="border shadow rounded-md p-4 w-full mx-auto">
            <div class="animate-pulse flex md:space-x-8 space-x-6">
              <div class="bg-gray-300 w-28 md:w-48 h-28 md:h-48 object-cover"></div>
              <div class="flex-1 space-y-6 py-1">
                <div class="h-4 bg-gray-300 rounded"></div>
                <div class="space-y-3">
                  <div class="grid grid-cols-3 gap-4">
                    <div class="h-4 bg-gray-300 rounded col-span-2"></div>
                    <div class="h-4 bg-gray-300 rounded col-span-1"></div>
                  </div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-4 bg-gray-300 rounded"></div>
                  <div class="h-6 w-24 !mt-6 bg-gray-300 rounded"></div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>





@push('scripts')
<script>
const searchForm=document.querySelector("#search-form"),searchFormInput=document.querySelector("#searchFormInput"),info=document.querySelector("#info"),SpeechRecognition=window.SpeechRecognition||window.webkitSpeechRecognition;if(SpeechRecognition){console.log("Your Browser supports speech Recognition");const e=new SpeechRecognition;e.continuous=!0;const o=document.querySelector("#v-button"),n=document.querySelector("#micIcon"),t=document.querySelector("#submitBtn");function micBtnClick(){n.classList.contains("fa-microphone")?e.start():e.stop()}function startSpeechRecognition(){info.style.display="block",n.classList.remove("fa-microphone"),n.classList.add("fa-microphone-slash"),searchFormInput.focus(),console.log("Voice activated, SPEAK")}function endSpeechRecognition(){info.style.display="none",n.classList.remove("fa-microphone-slash"),n.classList.add("fa-microphone"),searchFormInput.blur(),console.log("Speech recognition service disconnected")}function resultOfSpeechRecognition(o){const n=o.resultIndex,c=o.results[n][0].transcript;"reset"===c.toLowerCase().trim()?(e.stop(),Livewire.emit("searchInput",null)):(Livewire.emit("searchInput",c),searchFormInput.focus(),setTimeout(()=>{t.click()},800))}o.addEventListener("click",micBtnClick),e.addEventListener("start",startSpeechRecognition),e.addEventListener("end",endSpeechRecognition),e.addEventListener("result",resultOfSpeechRecognition)}else console.log("Your Browser does not support speech Recognition"),info.textContent="Your Browser does not support Speech Recognition";
</script>
@endpush


