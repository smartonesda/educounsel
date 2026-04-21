@extends('layouts.app')

@section('title', 'Konseling - Educounsel')

@section('content')
<div style="max-width:1100px;margin:40px auto;padding:0 20px;">
    <!-- Flash Message -->
    @if(session('success'))
    <div style="background:#d1fae5;border:1px solid #6ee7b7;border-radius:12px;padding:15px 20px;margin-bottom:20px;color:#065f46;">
        ✅ {{ session('success') }}
    </div>
    @endif

    <!-- Header -->
    <div style="background:white;border-radius:20px;padding:30px;margin-bottom:25px;box-shadow:0 4px 20px rgba(0,0,0,0.08);">
        <h1 style="font-size:26px;font-weight:700;color:#1e3a8a;margin-bottom:8px;">💬 Konseling Saya</h1>
        <p style="color:#64748b;">Kelola dan pantau riwayat konseling Anda</p>
        <a href="{{ route('student.counseling.create') }}" style="display:inline-block;margin-top:15px;padding:10px 24px;background:linear-gradient(135deg,#1e3a8a,#3730a3);color:white;border-radius:10px;text-decoration:none;font-weight:600;">
            + Ajukan Konseling Baru
        </a>
    </div>

    <!-- Counseling List -->
    <div style="background:white;border-radius:20px;padding:30px;box-shadow:0 4px 20px rgba(0,0,0,0.08);">
        <h3 style="font-size:18px;font-weight:700;color:#1f2937;margin-bottom:20px;">Riwayat Konseling</h3>
        <div style="text-align:center;padding:60px 20px;color:#9ca3af;">
            <div style="font-size:64px;margin-bottom:15px;">📋</div>
            <p style="font-size:16px;">Belum ada riwayat konseling.</p>
            <p style="font-size:14px;margin-top:8px;">Klik tombol di atas untuk mengajukan konseling pertama Anda.</p>
        </div>
    </div>
</div>
@endsection
