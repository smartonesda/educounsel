<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Kelas;

class AbsensiController extends Controller
{
    /**
     * Rekap Absensi - Menampilkan semua siswa.
     */
    public function rekapAbsensi(Request $request)
    {
        $query = User::with(['kelas'])
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

        $siswaList = $query->orderBy('nama')->paginate(10);

        foreach ($siswaList as $siswa) {
            $siswa->latest_absensi = Absensi::where('siswa_id', $siswa->id)->latest('tanggal')->first();
            $siswa->total_absensi = Absensi::where('siswa_id', $siswa->id)->count();
        }

        $kelasList = Kelas::orderBy('nama_kelas')->get();

        return view('guru_bk.rekap-absensi.index', compact('siswaList', 'kelasList'));
    }

    /**
     * Detail Absensi - Menampilkan detail absensi per siswa.
     */
    public function detailAbsensi($id)
    {
        $siswa = User::with('kelas')->findOrFail($id);

        if ($siswa->peran !== 'siswa') {
            abort(404, 'Data siswa tidak ditemukan');
        }

        $stats = [
            'hadir'    => Absensi::where('siswa_id', $id)->where('status', 'hadir')->count(),
            'izin'     => Absensi::where('siswa_id', $id)->whereIn('status', ['izin', 'sakit'])->count(),
            'alpha'    => Absensi::where('siswa_id', $id)->where('status', 'alpha')->count(),
            'terlambat'=> Absensi::where('siswa_id', $id)->where('status', 'hadir')->where('waktu_masuk', '>', '07:00:00')->count(),
        ];

        $absensiList = Absensi::where('siswa_id', $id)->orderBy('tanggal', 'desc')->paginate(10);

        return view('guru_bk.detail-absensi.index', compact('siswa', 'stats', 'absensiList'));
    }
}
