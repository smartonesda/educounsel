@extends('layouts.app-guru-bk')

@section('title', 'Detail Janji - Guru BK - Educounsel')

@section('content')
<div style="padding:30px;">
    <div style="background:white;border-radius:16px;padding:30px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
        <h1 style="font-size:24px;font-weight:700;color:#1e3a8a;margin-bottom:8px;">🗓️ Detail Janji Konseling</h1>
        <p style="color:#64748b;margin-bottom:25px;">Informasi lengkap janji konseling #{{ $appointment }}</p>

        <div style="background:#f0f9ff;border-radius:12px;padding:20px;text-align:center;">
            <div style="font-size:48px;margin-bottom:10px;">🗓️</div>
            <p style="color:#0369a1;">Detail janji konseling sedang diambil...</p>
        </div>

        <!-- Action Buttons -->
        <div style="display:flex;gap:10px;margin-top:20px;flex-wrap:wrap;">
            <form method="POST" action="{{ route('guru_bk.appointments.approve', $appointment) }}">
                @csrf
                <button type="submit" style="padding:10px 20px;background:#10b981;color:white;border:none;border-radius:8px;font-weight:600;cursor:pointer;">✅ Setujui</button>
            </form>
            <form method="POST" action="{{ route('guru_bk.appointments.reject', $appointment) }}">
                @csrf
                <button type="submit" style="padding:10px 20px;background:#ef4444;color:white;border:none;border-radius:8px;font-weight:600;cursor:pointer;">❌ Tolak</button>
            </form>
            <form method="POST" action="{{ route('guru_bk.appointments.complete', $appointment) }}">
                @csrf
                <button type="submit" style="padding:10px 20px;background:#3b82f6;color:white;border:none;border-radius:8px;font-weight:600;cursor:pointer;">🎯 Tandai Selesai</button>
            </form>
            <a href="{{ route('guru_bk.appointments.index') }}" style="padding:10px 20px;border:1.5px solid #e5e7eb;color:#374151;border-radius:8px;text-decoration:none;font-weight:600;">← Kembali</a>
        </div>
    </div>
</div>
@endsection
