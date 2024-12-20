<?php

namespace App\Http\Controllers;

use App\Models\Monev;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MonevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monevs = Monev::latest()->paginate(9);
        return view('backend.monev.index', compact('monevs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.monev.create');
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
        Monev::create($validatedData);
        session()->flash('status', 'SUKSES');
        session()->flash('pesan', 'Monev Berhasil Ditambahkan');
        return redirect()->route('monev.index');
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
        return view('backend.monev.edit', ['monev' => $monev]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monev $monev)
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
            if ($monev->thumbnail && Storage::disk('public')->exists($monev->thumbnail)) {
                Storage::disk('public')->delete($monev->thumbnail);
            }

            // Simpan thumbnail baru dengan nama sesuai slug
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = $validatedData['slug'] . '.' . $extension;
            $thumbnailPath = $request->file('thumbnail')->storeAs('thumbnails', $filename, 'public');

            // Update path thumbnail di database
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        // Update data monev
        $monev->update($validatedData);

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Monev berhasil diperbarui');
        return redirect()->route('monev.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monev $monev)
    {
        // Cek jika thumbnail ada dan file tersebut ada di storage
        if ($monev->thumbnail && Storage::disk('public')->exists($monev->thumbnail)) {
            // Hapus file thumbnail dari storage
            Storage::disk('public')->delete($monev->thumbnail);
        }
        $monev->delete();
        session()->flash('status', 'TERHAPUS');
        session()->flash('pesan', 'Monev Berhasil Dihapus');
        return redirect()->route('monev.index');
    }
}
