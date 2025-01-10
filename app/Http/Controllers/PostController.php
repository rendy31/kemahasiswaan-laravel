<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'user')
            ->when(auth()->user()->roles->pluck('id')->contains(3), function ($query) {
                // Jika user memiliki role dengan id_role 3, filter berdasarkan user_id
                $query->where('user_id', auth()->id());
            })
            ->latest()
            ->get();

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
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
        ]);

        $slug = Str::slug($request->title);
        $thumbnailPath = 'thumbnails/post_default.png'; // Default thumbnail

        // Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->storeAs(
                'public/thumbnails',
                $slug . '.' . $request->file('thumbnail')->getClientOriginalExtension()
            );
        }

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'thumbnail' => $thumbnailPath,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'isPublish' => $request->has('isPublish') ? 1 : 0,
        ]);

        // Pesan sukses dan redirect
        session()->flash('status', 'SAVED');
        session()->flash('pesan', 'Post berhasil ditambahkan');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('backend.blog.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
        ]);

        $slug = Str::slug($request->title);
        $thumbnailPath = $post->thumbnail;

        // Upload thumbnail baru jika ada
        if ($request->hasFile('thumbnail')) {
            // Jika thumbnail lama bukan default, hapus
            if ($post->thumbnail !== 'thumbnails/post_default.png') {
                Storage::delete($post->thumbnail);
            }

            $thumbnailPath = $request->file('thumbnail')->storeAs(
                'public/thumbnails',
                $slug . '.' . $request->file('thumbnail')->getClientOriginalExtension()
            );
        }

        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'thumbnail' => $thumbnailPath,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'isPublish' => $request->has('isPublish') ? 1 : 0,
        ]);

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Post berhasil diperbarui');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Jika thumbnail bukan default, hapus
        if ($post->thumbnail !== 'thumbnails/post_default.png') {
            Storage::delete($post->thumbnail);
        }

        $post->delete();

        // Pesan sukses dan redirect
        session()->flash('status', 'DELETED');
        session()->flash('pesan', 'Post berhasil dihapus');
        return redirect()->route('posts.index');
    }

    public function postDetail($slug)
    {
        // Cari post berdasarkan slug
        $postDetail = Post::where('slug', $slug)->firstOrFail();

        // Post category kegiatan mahasiswa
        $recentPosts = Post::where('category_id', $postDetail->category_id)
            ->where('id', '!=', $postDetail->id) // Kecualikan artikel yang sedang ditampilkan
            ->latest() // Urutkan berdasarkan created_at (terbaru)
            ->take(5) // Ambil 5 artikel
            ->get();


        // $recentPengembanganKarakter = Post::where('category_id', $postDetail->category_id)
        //                                 ->where('id', '!=', $postDetail->id) // Kecualikan artikel yang sedang ditampilkan
        //                                 ->latest() // Urutkan berdasarkan created_at (terbaru)
        //                                 ->take(5) // Ambil 5 artikel
        //                                 ->get();

        // $recentAsrama = Post::where('category_id', $postDetail->category_id)
        //                     ->where('id', '!=', $postDetail->id) // Kecualikan artikel yang sedang ditampilkan
        //                     ->latest() // Urutkan berdasarkan created_at (terbaru)
        //                     ->take(5) // Ambil 5 artikel
        //                     ->get();

        // $recentUmum = Post::where('category_id', $postDetail->category_id)
        //                     ->where('id', '!=', $postDetail->id) // Kecualikan artikel yang sedang ditampilkan
        //                     ->latest() // Urutkan berdasarkan created_at (terbaru)
        //                     ->take(5) // Ambil 5 artikel
        //                     ->get();

        // Kirim data post ke view
        return view('frontend.artikel-detail', compact('postDetail', 'recentPosts'));
    }

    public function recentPostKegMahasiswa()
    {
        // Post category kegiatan mahasiswa
        $PostKegiatanMahasiswa = Post::where('category_id', 1)->latest()->take(5)->get();

        // Kirim data post ke view
        return view('frontend.kegiatan-mahasiswa-detail', compact('PostKegiatanMahasiswa'));
    }
}
