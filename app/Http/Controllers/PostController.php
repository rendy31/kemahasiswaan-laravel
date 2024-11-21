<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.blog.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.blog.post.create', compact('categories'));
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
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul harus terdiri dari minimal 3 karakter.',
            'thumbnail.required' => 'Thumbnail harus diunggah.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berformat: jpeg, png, jpg, atau gif.',
            'thumbnail.max' => 'Thumbnail tidak boleh lebih dari 2MB.',
            'content.required' => 'Konten harus diisi.',
            'category_id.required' => 'Kategori harus dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
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

        // Simpan data ke dalam tabel posts
        Post::create($validatedData);
        session()->flash('status', 'SUKSES');
        session()->flash('pesan', 'Post Berhasil Ditambahkan');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('backend.blog.post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // thumbnail tidak wajib diisi
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul harus terdiri dari minimal 3 karakter.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berformat: jpeg, png, jpg, atau gif.',
            'thumbnail.max' => 'Thumbnail tidak boleh lebih dari 2MB.',
            'content.required' => 'Konten harus diisi.',
            'category_id.required' => 'Kategori harus dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        ]);

        // Generate slug dari title
        $validatedData['slug'] = Str::slug($request->title);

        // Update user_id dan isPublish
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['isPublish'] = $request->has('isPublish') ? 1 : 0;

        // Periksa apakah ada file thumbnail baru yang diunggah
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            // Simpan thumbnail baru dengan nama sesuai slug
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = $validatedData['slug'] . '.' . $extension;
            $thumbnailPath = $request->file('thumbnail')->storeAs('thumbnails', $filename, 'public');

            // Update path thumbnail di database
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        // Update data post
        $post->update($validatedData);

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Post berhasil diperbarui');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Cek jika thumbnail ada dan file tersebut ada di storage
        if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
            // Hapus file thumbnail dari storage
            Storage::disk('public')->delete($post->thumbnail);
        }
        $post->delete();
        session()->flash('status', 'TERHAPUS');
        session()->flash('pesan', 'Post Berhasil Dihapus');
        return redirect()->route('post.index');
    }
}
