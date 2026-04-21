<?php

namespace App\Http\Controllers\GuruBK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konseling;
use App\Models\Absensi;

class DashboardController extends Controller
{
    /**
     * Display guru BK dashboard with analytics.
     */
    public function index()
    {
        $totalSiswa = User::where('peran', 'siswa')->where('status', 'aktif')->count();
        $totalKonseling = Konseling::count();
        $totalAbsensi = Absensi::whereDate('tanggal', today())->count();

        return view('guru_bk.dashboard.index', compact(
            'totalSiswa',
            'totalKonseling',
            'totalAbsensi'
        ));
    }

    /**
     * Export analytics report.
     */
    public function exportAnalytics()
    {
        return back()->with('info', 'Fitur export analytics akan segera tersedia.');
    }
}
