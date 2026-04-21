<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konseling;
use App\Models\Absensi;

class MonitoringController extends Controller
{
    /**
     * Monitoring & Statistik index page.
     */
    public function index()
    {
        $totalSiswa  = User::where('peran', 'siswa')->where('status', 'aktif')->count();
        $totalGurubk = User::where('peran', 'guru_bk')->where('status', 'aktif')->count();
        $totalKonseling = Konseling::count();
        $absensiHariIni = Absensi::whereDate('tanggal', today())->count();

        return view('admin.monitoring.index', compact(
            'totalSiswa', 'totalGurubk', 'totalKonseling', 'absensiHariIni'
        ));
    }

    /**
     * Get monitoring data (JSON for charts).
     */
    public function getData(Request $request)
    {
        return response()->json([
            'siswa'     => User::where('peran', 'siswa')->count(),
            'konseling' => Konseling::count(),
            'absensi'   => Absensi::count(),
        ]);
    }

    /**
     * Export monitoring report as PDF.
     */
    public function exportPdf()
    {
        return back()->with('info', 'Fitur export PDF akan segera tersedia.');
    }

    /**
     * Export monitoring report as Excel.
     */
    public function exportExcel()
    {
        return back()->with('info', 'Fitur export Excel akan segera tersedia.');
    }
}
