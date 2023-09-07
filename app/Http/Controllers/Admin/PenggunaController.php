<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = User::where('email_verified_at', '!=', NULL)->get();

        return view('pages.admin.pengguna.index', compact(
            'pengguna'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userKepalaDinas = User::whereHas('roles', function ($query) {
            $query->where('name', 'Kepala Dinas');
        })->get();
        $role = Role::where('name', '<>', 'user');
        if ($userKepalaDinas->count() > 0) {
            $role = $role->where('name', '<>', 'Kepala Dinas');
        }
        $role = $role->get();
        return view('pages.admin.pengguna.create', compact(
            'userKepalaDinas',
            'role'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'username' => 'required|min:3|unique:users',
            'role' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

        $password = bcrypt('password');
        $new_user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
        ]);

        $roles = Role::where('id', $request->role)->first();
        $new_user->assignRole($roles);
        session()->flash('success', 'Akun pengguna berhasil dibuat dan role', $roles->name, '.');
        return redirect()->route('pengguna.show', $new_user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $roles = $user->getRoleNames()->toArray();
        return view('pages.admin.pengguna.show', compact(
            'id',
            'user',
            'roles'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.admin.pengguna.edit', compact(
            ''
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Periksa apakah peran pertama adalah "User", jika ya, hindari penghapusan
        if ($user->getRoleNames()->first() === 'User') {
            return redirect()->back()->with('error', 'Pengguna dengan peran "User" tidak dapat dihapus.');
        }

        // Periksa apakah pengguna yang sedang login adalah yang ingin dihapus
        if ($user->id === Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun yang sedang digunakan.');
        }

        $user->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
