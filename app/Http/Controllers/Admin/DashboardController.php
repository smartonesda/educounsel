<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konseling;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa    = User::where('peran', 'siswa')->where('status', 'aktif')->count();
        $totalGurubk   = User::where('peran', 'guru_bk')->where('status', 'aktif')->count();
        $totalKonseling = Konseling::count();
        $absensiHariIni = Absensi::whereDate('tanggal', today())->count();

        return view('admin.dashboard.index', compact(
            'totalSiswa', 'totalGurubk', 'totalKonseling', 'absensiHariIni'
        ));
    }
}