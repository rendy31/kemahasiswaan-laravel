<?php

namespace App\Http\Controllers;

use App\Models\achievement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\AchievementsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // Jika user memiliki role tertentu
        if ($user->hasAnyRole(['mahasiswa', 'BEM-HIMA'])) {
            // Tampilkan data berdasarkan user_id
            $achievements = Achievement::where('user_id', $user->id)->latest()->get();
        } else {
            // Tampilkan semua data
            $achievements = Achievement::latest()->get();
        }

        return view('backend.achievement.index', compact('achievements'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|in:PSIK,Fisioterapi,Admistrasi Kesehatan',
            'event' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'tglMulai' => 'required|date',
            'tglAkhir' => 'required|date|after_or_equal:tglMulai',
            'kategoriPenghargaan' => 'required|string|max:255',
            'peringkat' => 'required|string|in:Juara 1,Juara 2,Juara 3,Juara Harapan',
            'level' => 'required|string|in:Regional,Provinsi,Nasional,Internasional',
            'attachment' => 'required|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
        ]);
        // Tambahkan user_id berdasarkan user yang sedang login
        $validated['user_id'] = auth()->id();

        // Simpan attachment
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = $validated['nim'] . '-' . Str::slug($validated['nama']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $validated['attachment'] = $file->storeAs('achievements', $fileName, 'public');
        }

        // Simpan data ke database
        Achievement::create($validated);

        // Pesan sukses dan redirect
        session()->flash('status', 'SAVED');
        session()->flash('pesan', 'Data Prestasi berhasil disimpan');
        return redirect()->route('achievements.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(achievement $achievement)
    {
        return view('backend.achievement.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        // Validasi input
        $validated = $request->validate([
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|in:PSIK,Fisioterapi,Admistrasi Kesehatan',
            'event' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'tglMulai' => 'required|date',
            'tglAkhir' => 'required|date|after_or_equal:tglMulai',
            'kategoriPenghargaan' => 'required|string|max:255',
            'peringkat' => 'required|string|in:Juara 1,Juara 2,Juara 3,Juara Harapan',
            'level' => 'required|string|in:Regional,Provinsi,Nasional,Internasional',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
        ]);
        // Tambahkan user_id berdasarkan user yang sedang login
        $validated['user_id'] = auth()->id();

        // Handle attachment
        if ($request->hasFile('attachment')) {
            // Hapus file lama jika ada
            if ($achievement->attachment && Storage::disk('public')->exists($achievement->attachment)) {
                Storage::disk('public')->delete($achievement->attachment);
            }

            // Simpan file baru dengan nama yang sesuai format
            $file = $request->file('attachment');
            $fileName = $validated['nim'] . '-' . Str::slug($validated['nama']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('achievements', $fileName, 'public');

            // Update path ke validated data
            $validated['attachment'] = $filePath;
        } else {
            // Jika tidak ada file baru, jangan hapus attachment lama
            unset($validated['attachment']);
        }

        // Update data di database
        $achievement->update($validated);

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Data Prestasi berhasil diperbarui');
        return redirect()->route('achievements.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(achievement $achievement)
    {
        // Hapus file attachment jika ada
        if ($achievement->attachment) {
            Storage::disk('public')->delete($achievement->attachment);
        }

        $achievement->delete();

        // Pesan sukses dan redirect
        session()->flash('status', 'DELETED');
        session()->flash('pesan', 'Data Prestasi berhasil dihapus');
        return redirect()->route('achievements.index');
    }

    public function export(Request $request)
    {
        // Ambil filter 'prodi' dari input
        $prodi = $request->input('prodi');

        // Nama file export
        $fileName = 'achievements_' . $prodi . '.xlsx';

        // Return file Excel dengan filter prodi
        return Excel::download(new AchievementsExport($prodi), $fileName);
    }
}
