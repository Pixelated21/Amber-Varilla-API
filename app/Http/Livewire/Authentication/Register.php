<?php

namespace App\Http\Livewire\Authentication;

use App\Models\User;
use App\Models\UserProfile;
use Livewire\Component;

class Register extends Component
{
    public User $user;
    public $first_nm;
    public $last_nm;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'user.email' => 'required|email|unique:users,email',
        'first_nm' => 'required',
        'last_nm' => 'required',
        'password' => 'required|string|confirmed|min:2'
    ];

    public function updated()
    {
        $this->validate();
    }

    public function newUser()
    {
        $this->validate();
        $this->user->setAttribute('password', $this->password);
        $this->user->setUuidAttribute();
        $this->user->save();

        UserProfile::create([
            'first_nm' => $this->first_nm,
            'last_nm' => $this->last_nm,
            'user_id' => $this->user->id
        ])->newAvatar($this->first_nm);

        $this->emit(1, 'toast', 'success', 'You will be redirected shortly.');
        sleep(2);
        return redirect()->route('Login');
    }

    public function mount()
    {
        $this->user = new User;
        $this->userProfile = new UserProfile;
    }
    public function render()
    {
        return view('livewire.authentication.register');
    }
}
