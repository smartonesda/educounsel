<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::latest()->paginate(10);
        return view('guru_bk.materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru_bk.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'konten'   => 'required|string',
            'tipe'     => 'nullable|string|in:artikel,video,dokumen',
            'url_video'=> 'nullable|url',
        ]);

        $validated['created_by'] = auth()->id();

        Materi::create($validated);

        return redirect()->route('guru_bk.materi.index')
            ->with('success', 'Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        return view('guru_bk.materi.show', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        return view('guru_bk.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'konten'   => 'required|string',
            'tipe'     => 'nullable|string|in:artikel,video,dokumen',
            'url_video'=> 'nullable|url',
        ]);

        $materi->update($validated);

        return redirect()->route('guru_bk.materi.index')
            ->with('success', 'Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        $materi->delete();

        return redirect()->route('guru_bk.materi.index')
            ->with('success', 'Materi berhasil dihapus.');
    }

    /**
     * Toggle active/inactive status.
     */
    public function toggleStatus(Materi $materi)
    {
        // Materi model doesn't have status column, this is a placeholder
        return back()->with('info', 'Fitur toggle status belum tersedia.');
    }
}

