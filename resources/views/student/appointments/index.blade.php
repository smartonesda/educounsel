@extends('layouts.app')

@section('title', 'Janji Konseling - Educounsel')

@section('content')
<div style="max-width:1100px;margin:40px auto;padding:0 20px;">
    @if(session('success'))
    <div style="background:#d1fae5;border:1px solid #6ee7b7;border-radius:12px;padding:15px 20px;margin-bottom:20px;color:#065f46;">
        ✅ {{ session('success') }}
    </div>
    @endif

    <div style="background:white;border-radius:20px;padding:30px;margin-bottom:25px;box-shadow:0 4px 20px rgba(0,0,0,0.08);">
        <h1 style="font-size:26px;font-weight:700;color:#1e3a8a;margin-bottom:8px;">🗓️ Janji Konseling</h1>
        <p style="color:#64748b;margin-bottom:15px;">Kelola jadwal janji konseling Anda dengan Guru BK</p>
        <a href="{{ route('student.appointments.create') }}" style="display:inline-block;padding:10px 24px;background:linear-gradient(135deg,#1e3a8a,#3730a3);color:white;border-radius:10px;text-decoration:none;font-weight:600;">
            + Buat Janji Baru
        </a>
    </div>

    <div style="background:white;border-radius:20px;padding:30px;box-shadow:0 4px 20px rgba(0,0,0,0.08);">
        <h3 style="font-size:18px;font-weight:700;color:#1f2937;margin-bottom:20px;">Daftar Janji Konseling</h3>
        <div style="text-align:center;padding:60px 20px;color:#9ca3af;">
            <div style="font-size:64px;margin-bottom:15px;">🗓️</div>
            <p style="font-size:16px;">Belum ada janji konseling yang dibuat.</p>
        </div>
    </div>
</div>
@endsection
