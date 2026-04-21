@extends('layouts.app-guru-bk')

@section('title', 'Kalender Konseling - Guru BK - Educounsel')

@section('content')
<div style="padding:30px;">
    <div style="background:white;border-radius:16px;padding:30px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;">
            <div>
                <h1 style="font-size:24px;font-weight:700;color:#1e3a8a;">📅 Kalender Konseling</h1>
                <p style="color:#64748b;margin-top:4px;">Jadwal janji konseling dalam tampilan kalender</p>
            </div>
            <a href="{{ route('guru_bk.appointments.index') }}" style="padding:10px 20px;border:1.5px solid #e5e7eb;color:#374151;border-radius:10px;text-decoration:none;font-weight:600;">← Kembali ke Daftar</a>
        </div>

        <!-- Calendar placeholder -->
        <div style="background:#f8fafc;border:2px dashed #e2e8f0;border-radius:12px;padding:60px;text-align:center;color:#94a3b8;">
            <div style="font-size:64px;margin-bottom:15px;">📅</div>
            <p style="font-size:18px;font-weight:600;">Kalender Interaktif</p>
            <p style="font-size:14px;margin-top:8px;">Tampilan kalender akan diimplementasikan segera.</p>
        </div>
    </div>
</div>
@endsection
