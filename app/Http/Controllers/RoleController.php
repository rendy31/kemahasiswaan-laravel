<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        // Menampilkan daftar role
        $roles = Role::all();
        return view('backend.role.index', compact('roles'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat role baru
        return view('backend.role.create');
    }

    public function store(Request $request)
    {
        // Menyimpan role baru
        $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        // Pesan sukses dan redirect
        session()->flash('status', 'SAVED');
        session()->flash('pesan', 'Role berhasil disimpan');
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        // Menghapus role
        $role->delete();

        // Pesan sukses dan redirect
        session()->flash('status', 'DELETED');
        session()->flash('pesan', 'Role berhasil dihapus');
        return redirect()->route('roles.index');
    }

    public function editPermissions(Role $role)
    {
        // Ambil semua permission yang ada
        $permissions = Permission::all();

        // Ambil permission yang sudah dimiliki role ini
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('backend.role.permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    public function updatePermissions(Request $request, Role $role)
    {
        // Validasi input permission
        $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ]);



        // Sync permission yang dipilih dengan role
        $role->syncPermissions($request->permissions);

        session()->flash('status', 'SUCCESS');
        session()->flash('pesan', 'Permissions berhasil diperbarui');
        return redirect()->route('roles.index');
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        $role->update(['name' => $request->name]);

        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Nama Role berhasil diperbarui');
        return redirect()->route('roles.index');
    }
}
