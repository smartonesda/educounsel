@extends('layouts.app-guru-bk')

@section('title', 'Janji Konseling - Guru BK - Educounsel')

@section('content')
<div style="padding:30px;">
    @if(session('success'))
    <div style="background:#d1fae5;border:1px solid #6ee7b7;border-radius:10px;padding:15px;margin-bottom:20px;color:#065f46;">
        ✅ {{ session('success') }}
    </div>
    @endif

    <div style="background:white;border-radius:16px;padding:30px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
            <div>
                <h1 style="font-size:24px;font-weight:700;color:#1e3a8a;">🗓️ Janji Konseling</h1>
                <p style="color:#64748b;margin-top:4px;">Kelola permohonan janji konseling dari siswa</p>
            </div>
            <a href="{{ route('guru_bk.appointments.calendar') }}" style="padding:10px 20px;background:#1e3a8a;color:white;border-radius:10px;text-decoration:none;font-weight:600;">📅 Lihat Kalender</a>
        </div>

        <!-- Filter Tabs -->
        <div style="display:flex;gap:10px;margin-bottom:20px;">
            <button style="padding:8px 18px;background:#e0e7ff;color:#3730a3;border:none;border-radius:8px;font-weight:600;cursor:pointer;">Semua</button>
            <button style="padding:8px 18px;background:transparent;color:#6b7280;border:1px solid #e5e7eb;border-radius:8px;cursor:pointer;">Menunggu</button>
            <button style="padding:8px 18px;background:transparent;color:#6b7280;border:1px solid #e5e7eb;border-radius:8px;cursor:pointer;">Disetujui</button>
            <button style="padding:8px 18px;background:transparent;color:#6b7280;border:1px solid #e5e7eb;border-radius:8px;cursor:pointer;">Selesai</button>
        </div>

        <div style="text-align:center;padding:60px 20px;color:#9ca3af;">
            <div style="font-size:64px;margin-bottom:15px;">🗓️</div>
            <p style="font-size:16px;">Belum ada permohonan janji konseling dari siswa.</p>
        </div>
    </div>
</div>
@endsection
