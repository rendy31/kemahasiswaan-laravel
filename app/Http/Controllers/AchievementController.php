<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = Achievement::all();
        return view('backend.achievement.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dengan aturan dan pesan khusus
        $validatedData = $request->validate([
            'nim' => 'required|min:3',
            'nama' => 'required|min:3',
            'event' => 'required|min:3',
            'penyelenggara' => 'required|min:3',
            'tempat' => 'required|min:3',
            'tglMulai' => 'required',
            'tglAkhir' => 'required',
            'namaPenghargaan' => 'required|min:3',
            'peringkat' => 'required|min:3',
            'level' => 'required|min:3',
            'file' => 'file|max:5000|mimes:pdf', // max 5MB
        ], [
            'nim.required' => 'NIM wajib diisi.',
            'nim.min' => 'NIM harus terdiri dari minimal 3 karakter.',

            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama harus terdiri dari minimal 3 karakter.',

            'event.required' => 'event wajib diisi.',
            'event.min' => 'event harus terdiri dari minimal 3 karakter.',

            'penyelenggara.required' => 'Penyelenggara wajib diisi.',
            'penyelenggara.min' => 'Penyelenggara harus terdiri dari minimal 3 karakter.',

            'tempat.required' => 'Tempat wajib diisi.',
            'tempat.min' => 'Tempat harus terdiri dari minimal 3 karakter.',

            'tglMulai.required' => 'Tanggal mulai wajib diisi.',

            'tglAkhir.required' => 'Tanggal akhir wajib diisi.',

            'namaPenghargaan.required' => 'Nama penghargaan wajib diisi.',
            'namaPenghargaan.min' => 'Nama penghargaan harus terdiri dari minimal 3 karakter.',

            'peringkat.required' => 'Peringkat wajib diisi.',
            'peringkat.min' => 'Peringkat harus terdiri dari minimal 3 karakter.',

            'level.required' => 'Level wajib diisi.',
            'level.min' => 'Level harus terdiri dari minimal 3 karakter.',

            'file.file' => 'File yang diunggah harus berupa berkas.',
            'file.max' => 'Ukuran file maksimal adalah 5MB.',
            'file.mimes' => 'File harus dalam format PDF.',
        ]);

        // Simpan data ke dalam database
        $achievement = new Achievement();
        $achievement->nim = $validatedData['nim'];
        $achievement->nama = $validatedData['nama'];
        $achievement->event = $validatedData['event'];
        $achievement->penyelenggara = $validatedData['penyelenggara'];
        $achievement->tempat = $validatedData['tempat'];
        $achievement->tglMulai = $validatedData['tglMulai'];
        $achievement->tglAkhir = $validatedData['tglAkhir'];
        $achievement->namaPenghargaan = $validatedData['namaPenghargaan'];
        $achievement->peringkat = $validatedData['peringkat'];
        $achievement->level = $validatedData['level'];

        // Menyimpan file ke folder "achievements" jika ada file yang di upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/achievements');
            $achievement->file = str_replace('public/', 'storage/', $path); // Simpan path agar dapat diakses
        }

        // Simpan data ke database
        $achievement->save();

        session()->flash('status', 'SUKSES');
        session()->flash('pesan', 'Data Prestasi Berhasil Ditambahkan');
        return redirect()->route('achievement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        return view('backend.achievement.edit', ['achievement' => $achievement]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nim' => 'required|min:3',
            'nama' => 'required|min:3',
            'event' => 'required|min:3',
            'penyelenggara' => 'required|min:3',
            'tempat' => 'required|min:3',
            'tglMulai' => 'required|date',
            'tglAkhir' => 'required|date',
            'namaPenghargaan' => 'required|min:3',
            'peringkat' => 'required|min:3',
            'level' => 'required|min:3',
            'file' => 'file|max:5000|mimes:pdf', // max 5MB
        ], [
            'nim.required' => 'NIM wajib diisi.',
            'nim.min' => 'NIM harus terdiri dari minimal 3 karakter.',

            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama harus terdiri dari minimal 3 karakter.',

            'event.required' => 'Event wajib diisi.',
            'event.min' => 'Event harus terdiri dari minimal 3 karakter.',

            'penyelenggara.required' => 'Penyelenggara wajib diisi.',
            'penyelenggara.min' => 'Penyelenggara harus terdiri dari minimal 3 karakter.',

            'tempat.required' => 'Tempat wajib diisi.',
            'tempat.min' => 'Tempat harus terdiri dari minimal 3 karakter.',

            'tglMulai.required' => 'Tanggal mulai wajib diisi.',
            'tglMulai.date' => 'Tanggal mulai harus berupa tanggal yang valid.',

            'tglAkhir.required' => 'Tanggal akhir wajib diisi.',
            'tglAkhir.date' => 'Tanggal akhir harus berupa tanggal yang valid.',

            'namaPenghargaan.required' => 'Nama penghargaan wajib diisi.',
            'namaPenghargaan.min' => 'Nama penghargaan harus terdiri dari minimal 3 karakter.',

            'peringkat.required' => 'Peringkat wajib diisi.',
            'peringkat.min' => 'Peringkat harus terdiri dari minimal 3 karakter.',

            'level.required' => 'Level wajib diisi.',
            'level.min' => 'Level harus terdiri dari minimal 3 karakter.',

            'file.file' => 'File yang diunggah harus berupa berkas.',
            'file.max' => 'Ukuran file maksimal adalah 5MB.',
            'file.mimes' => 'File harus dalam format PDF.',
        ]);

        // Mengelola file baru
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($achievement->file && Storage::disk('public')->exists(str_replace('storage/', '', $achievement->file))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $achievement->file));
            }

            // Simpan file baru ke folder "achievements"
            $path = $request->file('file')->store('public/achievements');
            $validatedData['file'] = str_replace('public/', 'storage/', $path); // Simpan path agar dapat diakses
        }

        // Update data di database
        $achievement->update($validatedData);

        // Flash pesan berhasil
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Data dan file berhasil diperbarui.');

        // Redirect ke halaman index
        return redirect()->route('achievement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        // Cek jika file ada dan file tersebut ada di storage
        if ($achievement->file && Storage::disk('public')->exists(str_replace('storage/', '', $achievement->file))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $achievement->file));
        }

        $achievement->delete();
        session()->flash('status', 'TERHAPUS');
        session()->flash('pesan', 'Data dan File Achievement Berhasil Dihapus');
        return redirect()->route('achievement.index');
    }

    public function download($achievement)
    {
        $path = 'public/achievements/' . $achievement;  // Mengakses file di dalam storage/app/public/achievements

        // Cek apakah file ada
        if (Storage::exists($path)) {
            return Storage::download($path);  // Men-download file
        } else {
            return abort(404, 'File tidak ditemukan.');  // Menampilkan 404 jika file tidak ada
        }
    }


}
