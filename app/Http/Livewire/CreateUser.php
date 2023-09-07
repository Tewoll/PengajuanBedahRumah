<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $name;
    public $username;
    public $role;
    public $email;

    protected $rules = [
        'name' => 'required',
        'username' => 'required|unique:users',
        'role' => 'required',
        'email' => 'required|email|unique:users',
    ];

    public function updatedUsername()
    {
        $existingUser = User::where('username', $this->username)->first();
        if ($existingUser) {
            $this->emit('usernameTaken');
        }
    }

    public function updatedEmail()
    {
        $existingUser = User::where('email', $this->email)->first();
        if ($existingUser) {
            $this->emit('emailTaken');
        }
    }
    public function render()
    {
        $userKepalaDinas = User::whereHas('roles', function ($query) {
            $query->where('name', 'Kepala Dinas');
        })->get();
        $roles = Role::where('name', '<>', 'user');
        if ($userKepalaDinas->count() > 0) {
            $roles = $roles->where('name', '<>', 'Kepala Dinas');
        }
        $roles = $roles->get();
        return view('livewire.create-user', compact(
            'roles'
        ));
    }

    public function createUser()
    {
        $this->validate();

        // Proses pembuatan akun di sini
        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'role_id' => $this->role,
            'email' => $this->email,
            // ... tambahkan field lainnya
        ]);

        session()->flash('success', 'Akun pengguna berhasil dibuat.');

        $this->reset();
    }
}
