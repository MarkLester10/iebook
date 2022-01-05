<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProfileUpdate extends Component
{
    use WithFileUploads;

    public $userId;
    public $first_name;
    public $last_name;
    public $email;
    public $avatar;
    public $provider_id;


    public $prevLastName;
    public $prevFirstName;
    public $prevEmail;
    public $prevAvatar;

    public function mount()
    {
        $this->userId = auth()->user()->id;
        $model = User::find($this->userId);
        $this->first_name = $model->first_name;
        $this->last_name = $model->last_name;
        $this->email = $model->email;
        $this->avatar = $model->avatar;
        $this->provider_id = $model->provider_id;

        $this->prevFirstName = $model->first_name;
        $this->prevLastName = $model->last_name;
        $this->prevEmail = $model->email;
        $this->prevAvatar = $model->avatar;
    }

    protected $rules = [
        'first_name' => 'required|max:20',
        'last_name' => 'required|max:20',
        'email' => 'required|email',
        'avatar' => ['nullable', 'sometimes']
        // 'avatar' => ['nullable', 'sometimes', 'mimes:jpeg,jpg,png,gif,svg' , 'image', 'file', 'max:5242880']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateProfile()
    {
        $this->validate();
        $data = [];

        if ($this->first_name !== $this->prevFirstName) {
            $data = array_merge($data, [
                'first_name' => $this->first_name
            ]);
        }

        if ($this->last_name !== $this->prevLastName) {
            $data = array_merge($data, [
                'last_name' => $this->last_name
            ]);
        }

        if ($this->email !== $this->prevEmail) {
            $data = array_merge($data, [
                'email' => $this->email
            ]);
        }
        if ($this->avatar !== $this->prevAvatar) {

            Storage::delete('public/avatars/' . $this->prevAvatar);
            $avatarName = time() . '.' . $this->avatar->getClientOriginalName();
            $this->avatar->storeAs('storage/avatars/', $avatarName);
            $data = array_merge($data, [
                'avatar' => $avatarName
            ]);
        }

        if (count($data)) {
            User::find($this->userId)->update($data);
            session()->flash('message', 'Profile Updated Successfully');
            return redirect()->route('user.profile');
        }
    }



    public function render()
    {
        return view('livewire.profile-update');
    }
}
