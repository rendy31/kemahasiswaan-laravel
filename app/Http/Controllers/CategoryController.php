<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {   
        
        $categories = Category::latest()->paginate(10); // Pagination
        return view('backend.blog.category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.blog.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create(['name' => $request->name]);

        // Pesan sukses dan redirect
        session()->flash('status', 'SAVED');
        session()->flash('pesan', 'Kategori berhasil ditambahkan');
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('backend.blog.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update(['name' => $request->name]);

       // Pesan sukses dan redirect
       session()->flash('status', 'UPDATED');
       session()->flash('pesan', 'Kategori berhasil diperbarui');
       return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Kategori berhasil dihapus');
        return redirect()->route('categories.index');
    }
}
