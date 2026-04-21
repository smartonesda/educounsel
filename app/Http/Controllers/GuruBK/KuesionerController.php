<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kuesioner;
use App\Models\JenisKuesioner;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kuesioners = Kuesioner::with('jenisKuesioner')->latest()->paginate(10);
        return view('guru_bk.kuesioner.index', compact('kuesioners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisKuesioners = JenisKuesioner::all();
        return view('guru_bk.kuesioner.create', compact('jenisKuesioners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'              => 'required|string|max:255',
            'deskripsi'          => 'nullable|string',
            'jenis_kuesioner_id' => 'required|exists:jenis_kuesioner,id',
        ]);

        Kuesioner::create($validated);

        return redirect()->route('guru_bk.kuesioner.index')
            ->with('success', 'Kuesioner berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kuesioner = Kuesioner::with(['pertanyaan', 'jenisKuesioner'])->findOrFail($id);
        return view('guru_bk.kuesioner.show', compact('kuesioner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kuesioner = Kuesioner::findOrFail($id);
        $jenisKuesioners = JenisKuesioner::all();
        return view('guru_bk.kuesioner.edit', compact('kuesioner', 'jenisKuesioners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kuesioner = Kuesioner::findOrFail($id);

        $validated = $request->validate([
            'judul'              => 'required|string|max:255',
            'deskripsi'          => 'nullable|string',
            'jenis_kuesioner_id' => 'required|exists:jenis_kuesioner,id',
        ]);

        $kuesioner->update($validated);

        return redirect()->route('guru_bk.kuesioner.index')
            ->with('success', 'Kuesioner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kuesioner = Kuesioner::findOrFail($id);
        $kuesioner->delete();

        return redirect()->route('guru_bk.kuesioner.index')
            ->with('success', 'Kuesioner berhasil dihapus.');
    }
}
