<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchComponent extends Component
{
    public $term;


    protected $listeners = ['searchInput'];

    public function searchInput($value)
    {
        $this->term = $value;
    }

    public function clearInput()
    {
        $this->term = null;
    }

    public function search()
    {
        sleep(3);
    }

    public function render()
    {
        return view('livewire.search-component');
    }
}
