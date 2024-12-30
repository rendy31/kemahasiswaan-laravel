<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles', 'permissions')->get();
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('backend.user.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->syncRoles([$request->role]);

        // Ambil nama permissions dari ID
        if ($request->permissions) {
            $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');
            $user->syncPermissions($permissions);
        }

        session()->flash('status', 'SAVED');
        session()->flash('pesan', 'User berhasil disimpan!');
        return redirect()->route('users.index');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('backend.user.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required',
        ]);

        $user->update($request->only(['name', 'email']));

        $user->syncRoles([$request->role]);

        // Ambil nama permissions dari ID
        if ($request->permissions) {
            $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');
            $user->syncPermissions($permissions);
        } else {
            $user->syncPermissions([]); // Kosongkan jika tidak ada permission
        }

        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Data User berhasil diperbarui!');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('status', 'DELETED');
        session()->flash('pesan', 'User berhasil dihapus!');
        return redirect()->route('users.index');
    }
}
