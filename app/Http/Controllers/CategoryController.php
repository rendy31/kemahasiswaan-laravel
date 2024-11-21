<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.blog.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate(
            [
                'name' => 'required|min:3|unique:categories',
            ],
        [
                'name.required' => 'Kategori Wajib Diisi',
                'name.min' => 'Kategori harus terdiri dari minimal 3 karakter.',
                'name.unique' => 'Kategori sudah ada',
            ]
        );

        
        Category::create($validated);
        session()->flash('status','SUKSES');
        session()->flash('pesan','Kategori Berhasil Ditambahkan');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.blog.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate(
            [
                'name' => 'required|min:3|unique:categories,name,'.$category->id,
            ],
        [
                'name.required' => 'Kategori Wajib Diisi',
                'name.min' => 'Kategori harus terdiri dari minimal 3 karakter.',
                'name.unique' => 'Kategori sudah ada',
            ]
        );

        
        Category::where('id',$category->id)->update($validated);
        session()->flash('status','DIPERBAHARUI');
        session()->flash('pesan','Kategori Berhasil Diperbaharui');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('status','TERHAPUS');
        session()->flash('pesan','Kategori Berhasil Dihapus');
        return redirect()->route('category.index');
    }

    public function page()
    {
        return view('backend.blog.page.index');
    }
}
