<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloads = Download::orderBy('id', 'DESC')->get();
        return view('backend.download.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.download.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dengan aturan dan pesan khusus
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'file' => 'required|file|max:5000|extensions:jpg,png,jpeg,pdf,doc,docx,xls,xlsx', // max 5MB
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul harus terdiri dari minimal 3 karakter.',
            'description.required' => 'Deskripsi harus diisi.',
            'description.min' => 'Deskripsi harus terdiri dari minimal 3 karakter.',
            'file.required' => 'File harus diunggah.',
            'file.max' => 'File tidak boleh lebih dari 10 MB.',
            'file.extensions' => 'Jenis file harus berupa: jpg, jpeg, png, pdf, doc, atau docx.',
            'file.file' => 'Jenis file harus Valid',
        ]);
       

        // Generate slug dari title tapi tidak disimpan ke dbase
        $slug = Str::slug($request->title);

        // Tambahkan user_id dari user yang sedang login
        // $validatedData['user_id'] = Auth::User()->id;


        // Upload file dengan nama yang sesuai slug
        if ($request->hasFile('file')) {
            // Dapatkan ekstensi file asli
            $extension = $request->file('file')->getClientOriginalExtension();

            // Buat nama file baru berdasarkan slug dan tambahkan ekstensi
            $filename = $slug . '.' . $extension;

            // Simpan file ke direktori 'files' di storage/public
            $filePath = $request->file('file')->storeAs('files', $filename, 'public');

            $validatedData['file'] = $filePath;
        }

        // Simpan data ke dalam tabel downloads
        Download::create($validatedData);
        session()->flash('status', 'SUKSES');
        session()->flash('pesan', 'File Download Berhasil Ditambahkan');
        return redirect()->route('download.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Download $download)
    {
        return view('backend.download.edit', ['download' => $download]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Download $download)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'file' => 'file|max:5000|extensions:jpg,png,jpeg,pdf,doc,docx,xls,xlsx', // max 5MB
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul harus terdiri dari minimal 3 karakter.',
            'description.required' => 'Deskripsi harus diisi.',
            'description.min' => 'Deskripsi harus terdiri dari minimal 3 karakter.',
            'file.max' => 'File tidak boleh lebih dari 10 MB.',
            'file.extensions' => 'Jenis file harus berupa: jpg, jpeg, png, pdf, doc, atau docx.',
            'file.file' => 'Jenis file harus Valid',
        ]);

        // Generate slug dari title
        $slug = Str::slug($request->title);

        // Update user_id dan isPublish
        // $validatedData['user_id'] = Auth::user()->id;
        // $validatedData['isPublish'] = $request->has('isPublish') ? 1 : 0;

        // Periksa apakah ada file thumbnail baru yang diunggah
        if ($request->hasFile('file')) {
            // Hapus thumbnail lama jika ada
            if ($download->file && Storage::disk('public')->exists($download->file)) {
                Storage::disk('public')->delete($download->file);
            }

            // Simpan thumbnail baru dengan nama sesuai slug
            $extension = $request->file('file')->getClientOriginalExtension();
            $filename = $slug . '.' . $extension;
            $filePath = $request->file('file')->storeAs('files', $filename, 'public');

            // Update path thumbnail di database
            $validatedData['file'] = $filePath;
        }

        // Update data post
        $download->update($validatedData);

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Download berhasil diperbarui');
        return redirect()->route('download.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        // Cek jika file ada dan file tersebut ada di storage
        if ($download->file && Storage::disk('public')->exists($download->file)) {
            // Hapus file file dari storage
            Storage::disk('public')->delete($download->file);
        }
        $download->delete();
        session()->flash('status', 'TERHAPUS');
        session()->flash('pesan', 'File Download Berhasil Dihapus');
        return redirect()->route('download.index');
    }

    public function download($filename)
    {
        $path = 'public/files/' . $filename;  // Mengakses file di dalam storage/app/public/files

        // Cek apakah file ada
        if (Storage::exists($path)) {
            return Storage::download($path);  // Men-download file
        } else {
            return abort(404, 'File tidak ditemukan.');  // Menampilkan 404 jika file tidak ada
        }
    }
}
