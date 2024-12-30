<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('backend.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
        ]);

        Permission::create([
            'name' => $request->name,
        ]);

        session()->flash('status', 'SUCCESS');
        session()->flash('pesan', 'Permission berhasil dibuat');
        return redirect()->route('permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        session()->flash('status', 'DELETED');
        session()->flash('pesan', 'Permission berhasil dihapus');
        return redirect()->route('permissions.index');
    }
}
