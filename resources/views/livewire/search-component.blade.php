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
            <button wire:ignore type="button" class="app__btn-t w-full flex items-center justify-center space-x-2" id="v-button">
                <i class="fas fa-microphone text-[16px]" id="micIcon"></i>
                <span>Voice Search </span>
            </button>
        </div>
    </form>

    {{-- <div class="bg-white p-6 mt-10 space-y-8 max-h-[800px] overflow-y-auto">
            <div class="border flex p-4 md:p-6 md:space-x-8 space-x-6">
                <img src="{{ asset('imgs/logo_v2.png') }}" class="w-28 md:w-48 h-28 md:h-48 object-cover" alt="">
                <div>
                    <h1 class="subtitle__text">Fishbone Diagram</h1>
                    <p class="font-light lowercase line-clamp-3 mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus maiores omnis odit tempore consectetur, rerum fugiat explicabo nostrum soluta! Laudantium dicta veniam officia animi, distinctio voluptatum dolore dolorum placeat vitae aperiam ea nihil perspiciatis quod qui blanditiis aliquam officiis enim voluptatibus. Impedit deleniti et ratione ducimus quam consequatur quasi omnis?</p>
                    <button class="!text-green-500 underline mt-4 text-[13px]">Read More</button>
                </div>
            </div>
    </div> --}}

    <div class="bg-white p-6 mt-10 space-y-8 overflow-y-auto w-full" wire:loading wire:target="search">
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
    const searchForm = document.querySelector("#search-form");
const searchFormInput = document.querySelector("#searchFormInput");
const info = document.querySelector("#info");


// The speech recognition interface lives on the browser’s window object
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition; // if none exists -> undefined

if(SpeechRecognition) {
  console.log("Your Browser supports speech Recognition");

  const recognition = new SpeechRecognition();
  recognition.continuous = true;
  // recognition.lang = "en-US";


  const micBtn = document.querySelector("#v-button");
  const micIcon = document.querySelector("#micIcon");
  const submitBtn = document.querySelector("#submitBtn");

  micBtn.addEventListener("click", micBtnClick);
  function micBtnClick() {
    if(micIcon.classList.contains("fa-microphone")) { // Start Voice Recognition
    recognition.start();
    }
    else {
    recognition.stop();
    }
  }

  recognition.addEventListener("start", startSpeechRecognition); // <=> recognition.onstart = function() {...}
  function startSpeechRecognition() {
    info.style.display = "block";
    micIcon.classList.remove("fa-microphone");
    micIcon.classList.add("fa-microphone-slash");
    searchFormInput.focus();
    console.log("Voice activated, SPEAK");
  }

  recognition.addEventListener("end", endSpeechRecognition); // <=> recognition.onend = function() {...}
  function endSpeechRecognition() {
    info.style.display = "none";
    micIcon.classList.remove("fa-microphone-slash");
    micIcon.classList.add("fa-microphone");
    searchFormInput.blur();
    console.log("Speech recognition service disconnected");
  }


  recognition.addEventListener("result", resultOfSpeechRecognition); // <=> recognition.onresult = function(event) {...} - Fires when you stop talking
  function resultOfSpeechRecognition(event) {
    const current = event.resultIndex;
    const transcript = event.results[current][0].transcript;

    if(transcript.toLowerCase().trim()=== "reset") {
      recognition.stop();
      Livewire.emit('searchInput',null);
    }else {
    Livewire.emit('searchInput',transcript);
    searchFormInput.focus();
    setTimeout(() => {
        submitBtn.click();
    }, 800);
    }



  }


}
else {
  console.log("Your Browser does not support speech Recognition");
  info.textContent = "Your Browser does not support Speech Recognition";
}
</script>
@endpush


