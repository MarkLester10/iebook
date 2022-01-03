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
    public $search_limit;
    public $name;
    public $email;
    public $currentUser;

    public function updating()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'vendor.livewire.custom-pagination';
    }

    public function edit($id)
    {
        $this->dispatchBrowserEvent('open_modal_user');
        $user = User::find($id);
        $this->currentUser = $user;
        $this->search_limit = $user->search_limit;
        $this->name = $user->getFullName();
        $this->email = $user->email;
    }

    public function clearModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('close_modal_user');
    }

    public function update()
    {
        $res = $this->currentUser->update([
            'search_limit' => $this->search_limit,
        ]);

        if($res){
            $this->clearModal();
            $this->dispatchBrowserEvent('notification',['message' => 'Search limit updated successfully','type' =>'success']);
        }else{
            $this->clearModal();
            $this->dispatchBrowserEvent('notification',['message' => 'Something went wrong. Please try again.','type' =>'danger']);
        }
    }

    public function render()
    {
        $customers = User::search($this->search)->latest()->simplePaginate();
        return view('livewire.users-table', compact('customers'));
    }
}
