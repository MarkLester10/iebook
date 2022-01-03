<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TermModal extends Component
{
    public $currentTerm;

    protected $listeners = ['popModal'];

    public function popModal($term)
    {
        $this->currentTerm = $term;
    }

    public function closeReadMoreModal()
    {
        $this->currentTerm = null;
    }

    public function render()
    {
        return view('livewire.term-modal');
    }
}
