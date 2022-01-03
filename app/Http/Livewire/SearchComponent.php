<?php

namespace App\Http\Livewire;

use App\Models\Term;
use Livewire\Component;

class SearchComponent extends Component
{
    public $term;
    public $terms = [];
    public $noFound = 0;
    public $limitPerPage = 5;
    public $termsCount;
    public $totalTerms;

    protected $listeners = ['searchInput'];


    public function loadMore()
    {
        $this->limitPerPage += 5;
        $this->terms = Term::search($this->term)->where('is_hidden', 0)->latest()->limit($this->limitPerPage)->get();
         sleep(1.5);
    }

    public function searchInput($value)
    {
        $this->term = $value;
    }

    public function clearInput()
    {
        $this->term = null;
        $this->terms = [];
    }

    public function search()
    {
        sleep(1.5);
        if(auth()->user()->is_premium){
            $this->continueSearching();
        }else{
            if(auth()->user()->search_limit == 0){
                return redirect()->route('home');
            }
            $this->continueSearching();
            if($this->termsCount > 0){
                if(auth()->user()->search_limit != 0){
                    auth()->user()->update([
                        'search_limit' => auth()->user()->search_limit - 1
                    ]);
                }
            }
        }

    }

    private function continueSearching(){
        $this->terms = Term::search($this->term)->where('is_hidden', 0)->latest()->limit($this->limitPerPage)->get();
        $this->totalTerms = Term::search($this->term)->where('is_hidden', 0)->latest()->count();
        $this->noFound = count($this->terms) == 0 ? 1: 0;
        $this->termsCount = count($this->terms);
    }

    public function readMore($id)
    {
        $term = Term::findOrFail($id);
        $this->emit('popModal', $term);
    }



    public function render()
    {
        if($this->term == ''){
            $this->terms = [];
            $this->noFound = 0;
        }
        return view('livewire.search-component');
    }
}
