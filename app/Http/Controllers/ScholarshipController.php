<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scholarships = Scholarship::latest()->get();
        return view('backend.scholarship.index', compact('scholarships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.scholarship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:10000',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('scholarships', 'public');
        }

        Scholarship::create($validated);

        // Pesan sukses dan redirect
        session()->flash('status', 'SAVED');
        session()->flash('pesan', 'Beasiswa berhasil ditambahkan');
        return redirect()->route('scholarships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scholarship $scholarship)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scholarship $scholarship)
    {
        return view('backend.scholarship.edit', compact('scholarship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:10000',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('attachment')) {
            // Hapus file lama jika bukan null
            if ($scholarship->attachment) {
                Storage::disk('public')->delete($scholarship->attachment);
            }
            $validated['attachment'] = $request->file('attachment')->store('scholarships', 'public');
        }

        $scholarship->update($validated);

                // Pesan sukses dan redirect
                session()->flash('status', 'UPDATED');
                session()->flash('pesan', 'Beasiswa berhasil diperbarui');
                return redirect()->route('scholarships.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scholarship $scholarship)
    {
        if ($scholarship->attachment) {
            Storage::disk('public')->delete($scholarship->attachment);
        }

        $scholarship->delete();

                // Pesan sukses dan redirect
                session()->flash('status', 'DELETED');
                session()->flash('pesan', 'Beasiswa berhasil dihapus');
                return redirect()->route('scholarships.index');
    
    }

    public function scholarshipDetail($slug)
    {
        // Cari scholarship berdasarkan slug
        $scholarshipDetail = scholarship::where('slug', $slug)->firstOrFail();

        // scholarship category kegiatan mahasiswa
        $recentScholarships = scholarship::where('id', '!=', $scholarshipDetail->id) // Kecualikan artikel yang sedang ditampilkan
                                        ->latest() // Urutkan berdasarkan created_at (terbaru)
                                        ->take(5) // Ambil 5 artikel
                                        ->get();


        // Kirim data scholarship ke view
        return view('frontend.beasiswa-detail', compact('scholarshipDetail','recentScholarships'));
    }
}
