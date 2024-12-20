<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\studentActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = studentActivity::latest()->paginate(9);
        return view('backend.student-activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.student-activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dengan aturan dan pesan khusus
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
            'content' => 'required',
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul harus terdiri dari minimal 3 karakter.',
            'thumbnail.required' => 'Thumbnail harus diunggah.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berformat: jpeg, png, jpg, atau gif.',
            'thumbnail.max' => 'Thumbnail tidak boleh lebih dari 2MB.',
            'content.required' => 'Konten harus diisi.',
        ]);

        // Generate slug dari title
        $validatedData['slug'] = Str::slug($request->title);

        // Tambahkan user_id dari user yang sedang login
        $validatedData['user_id'] = Auth::User()->id;

        // Set nilai isPublish berdasarkan status checkbox (default ke 0 jika tidak dicentang)
        $validatedData['isPublish'] = $request->has('isPublish') ? 1 : 0;

        // Upload thumbnail dengan nama yang sesuai slug
        if ($request->hasFile('thumbnail')) {
            // Dapatkan ekstensi file asli
            $extension = $request->file('thumbnail')->getClientOriginalExtension();

            // Buat nama file baru berdasarkan slug dan tambahkan ekstensi
            $filename = $validatedData['slug'] . '.' . $extension;

            // Simpan file ke direktori 'thumbnails' di storage/public
            $thumbnailPath = $request->file('thumbnail')->storeAs('thumbnails', $filename, 'public');

            $validatedData['thumbnail'] = $thumbnailPath;
        }

        // Simpan data ke dalam tabel student-activities
        studentActivity::create($validatedData);
        session()->flash('status', 'SUKSES');
        session()->flash('pesan', 'Kegiatan Mahasiswa Berhasil Ditambahkan');
        return redirect()->route('kegiatan-mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(studentActivity $studentActivity)
    {
        $recentStudentActivity = studentActivity::latest()->paginate(5);
        return view('frontend.kegiatan-mahasiswa-detail', compact('studentActivity','recentStudentActivity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(studentActivity $studentActivity)
    {
        return view('backend.student-activity.edit', ['studentActivity' => $studentActivity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, studentActivity $studentActivity)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // thumbnail tidak wajib diisi
            'content' => 'required',
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul harus terdiri dari minimal 3 karakter.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berformat: jpeg, png, jpg, atau gif.',
            'thumbnail.max' => 'Thumbnail tidak boleh lebih dari 2MB.',
            'content.required' => 'Konten harus diisi.',
        ]);

        // Generate slug dari title
        $validatedData['slug'] = Str::slug($request->title);

        // Update user_id dan isPublish
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['isPublish'] = $request->has('isPublish') ? 1 : 0;

        // Periksa apakah ada file thumbnail baru yang diunggah
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($studentActivity->thumbnail && Storage::disk('public')->exists($studentActivity->thumbnail)) {
                Storage::disk('public')->delete($studentActivity->thumbnail);
            }

            // Simpan thumbnail baru dengan nama sesuai slug
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = $validatedData['slug'] . '.' . $extension;
            $thumbnailPath = $request->file('thumbnail')->storeAs('thumbnails', $filename, 'public');

            // Update path thumbnail di database
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        // Update data studentAc$studentActivity
        $studentActivity->update($validatedData);

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Kegiatan Mahasiswa berhasil diperbarui');
        return redirect()->route('kegiatan-mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(studentActivity $studentActivity)
    {
        // Cek jika thumbnail ada dan file tersebut ada di storage
        if ($studentActivity->thumbnail && Storage::disk('public')->exists($studentActivity->thumbnail)) {
            // Hapus file thumbnail dari storage
            Storage::disk('public')->delete($studentActivity->thumbnail);
        }
        $studentActivity->delete();
        session()->flash('status', 'TERHAPUS');
        session()->flash('pesan', 'Kegiatan Mahasiswa Berhasil Dihapus');
        return redirect()->route('kegiatan-mahasiswa.index');
    }
}
