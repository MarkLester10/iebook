<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User\User;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 5;

    public function updating()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'vendor.livewire.custom-pagination';
    }

    public function render()
    {
        $customers = User::search($this->search)->latest()->simplePaginate();
        return view('livewire.users-table', compact('customers'));
    }
}
