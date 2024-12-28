<?php

namespace App\Http\Controllers;

use App\Models\Monev;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MonevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $monevs = Monev::latest()->get();
        return view('backend.monev.index', compact('monevs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.monev.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'attachment' => 'required|nullable|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $validated['attachment'] = $file->storeAs('monevs', $fileName, 'public');
        }

        Monev::create($validated);

        // Pesan sukses dan redirect
        session()->flash('status', 'SAVED');
        session()->flash('pesan', 'Monev berhasil disimpan');
        return redirect()->route('monevs.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Monev $monev)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monev $monev)
    {
        return view('backend.monev.edit', compact('monev'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monev $monev)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
        ]);

        // Handle attachment
        if ($request->hasFile('attachment')) {
            // Hapus file lama jika ada
            if ($monev->attachment) {
                Storage::disk('public')->delete($monev->attachment);
            }

            $file = $request->file('attachment');
            $fileName = Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $validated['attachment'] = $file->storeAs('monevs', $fileName, 'public');
        }

        $monev->update($validated);

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Monevs berhasil diperbarui');
        return redirect()->route('monevs.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monev $monev)
    {
        if ($monev->attachment) {
            Storage::disk('public')->delete($monev->attachment);
        }

        $monev->delete();

        // Pesan sukses dan redirect
        session()->flash('status', 'DELETED');
        session()->flash('pesan', 'Monev berhasil dihapus');
        return redirect()->route('monevs.index');
    
    }

    public function monevDetail($slug)
    {
        // Cari monev berdasarkan slug
        $monevDetail = Monev::where('slug', $slug)->firstOrFail();

        // monev category kegiatan mahasiswa
        $recentMonevs = Monev::where('id', '!=', $monevDetail->id) // Kecualikan artikel yang sedang ditampilkan
                                        ->latest() // Urutkan berdasarkan created_at (terbaru)
                                        ->take(5) // Ambil 5 artikel
                                        ->get();


        // Kirim data monev ke view
        return view('frontend.monev-detail', compact('monevDetail','recentMonevs'));
    }
}
