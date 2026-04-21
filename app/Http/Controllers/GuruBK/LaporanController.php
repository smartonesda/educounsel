<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\User;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Show monthly report page.
     */
    public function bulanan(Request $request)
    {
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);
        $kelasId = $request->input('kelas_id');

        $kelasList = Kelas::orderBy('nama_kelas')->get();

        $query = Absensi::whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }
        $absensiData = $query->with(['siswa', 'kelas'])->orderBy('tanggal')->get();

        return view('guru_bk.laporan.bulanan', compact('absensiData', 'kelasList', 'bulan', 'tahun', 'kelasId'));
    }

    /**
     * Get kelas list (JSON).
     */
    public function getKelasList()
    {
        $kelasList = Kelas::orderBy('nama_kelas')->get(['id', 'nama_kelas']);
        return response()->json($kelasList);
    }

    /**
     * Export report as PDF.
     */
    public function exportPDF(Request $request)
    {
        return back()->with('info', 'Fitur export PDF akan segera tersedia.');
    }

    /**
     * Export report as Excel.
     */
    public function exportExcel(Request $request)
    {
        return back()->with('info', 'Fitur export Excel akan segera tersedia.');
    }
}
