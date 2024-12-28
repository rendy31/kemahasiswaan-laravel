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
        $downloads = Download::latest()->get();
        return view('backend.download.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.download.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'attachment' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB
        ]);

        // Rename the attachment to the slug
        $attachment = $request->file('attachment');
        $attachmentName = Str::slug($request->title) . '.' . $attachment->getClientOriginalExtension();
        $validated['attachment'] = $attachment->storeAs('downloads', $attachmentName, 'public');

        Download::create($validated);

        // Pesan sukses dan redirect
        session()->flash('status', 'SAVED');
        session()->flash('pesan', 'Download berhasil dihapus');
        return redirect()->route('downloads.index');
    
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
        //
        return view('backend.download.edit', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Download $download)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // 10MB
        ]);

        // Handle attachment
        if ($request->hasFile('attachment')) {
            // Hapus file lama jika ada
            if ($download->attachment) {
                Storage::disk('public')->delete($download->attachment);
            }
            // Rename the new attachment to the slug
            $attachment = $request->file('attachment');
            $attachmentName = Str::slug($request->title) . '.' . $attachment->getClientOriginalExtension();
            $validated['attachment'] = $attachment->storeAs('downloads', $attachmentName, 'public');
        }

        $download->update($validated);

        // Pesan sukses dan redirect
        session()->flash('status', 'UPDATED');
        session()->flash('pesan', 'Download berhasil diperbarui');
        return redirect()->route('downloads.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        //
        if ($download->attachment) {
            Storage::disk('public')->delete($download->attachment);
        }

        $download->delete();

        // Pesan sukses dan redirect
        session()->flash('status', 'DELETED');
        session()->flash('pesan', 'Download berhasil dihapus');
        return redirect()->route('downloads.index');
    
    }
}
