<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of all students.
     */
    public function index(Request $request)
    {
        $query = User::with('kelas')
            ->where('peran', 'siswa')
            ->where('status', 'aktif');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nis_nip', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
        }

        $siswas = $query->orderBy('nama')->paginate(15);
        $kelasList = Kelas::orderBy('nama_kelas')->get();

        return view('guru_bk.data-siswa.index', compact('siswas', 'kelasList'));
    }

    /**
     * Show full profile of a student.
     */
    public function show($id)
    {
        $siswa = User::with('kelas')->where('peran', 'siswa')->findOrFail($id);

        return view('guru_bk.data-siswa.show', compact('siswa'));
    }
}
