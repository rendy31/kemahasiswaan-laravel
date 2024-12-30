<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::all();
        return view('backend.organization.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        return view('backend.organization.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        // Validasi input
        $request->validate([
            'structure' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Gambar opsional
            'description' => 'nullable|string',  // opsional
        ]);

        // Inisialisasi data yang akan diupdate
        $updateData = [];

        // Proses gambar jika diunggah
        if ($request->hasFile('structure')) {
            // Path folder penyimpanan gambar
            $folder = 'public/structures';

            // Hapus gambar lama jika ada
            if ($organization->structure && Storage::exists($organization->structure)) {
                Storage::delete($organization->structure);
            }

            // Ambil file gambar baru dari request
            $file = $request->file('structure');

            // Buat nama file baru berdasarkan field 'name'
            $newFileName = $organization->name . '.' . $file->getClientOriginalExtension();

            // Simpan gambar ke folder dengan nama baru
            $path = $file->storeAs($folder, $newFileName);

            // Update field 'structure' di data yang akan diupdate
            $updateData['structure'] = str_replace('public/', '', $path); // Simpan hanya path relatif
        }

        // Periksa apakah description ada dalam request (gunakan has() untuk menangani string kosong)
        if ($request->has('description')) {
            $updateData['description'] = $request->input('description');
        }

        // Debug jika diperlukan
        // dd($updateData);

        // Update data di database
        $organization->update($updateData);

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Struktur berhasil diperbarui');
        return redirect()->route('organizations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
