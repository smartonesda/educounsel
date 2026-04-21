@extends('layouts.app-admin')

@section('title', 'Admin - Educounsel')

@section('content')
<div style="padding:30px;">
    <div style="background:white;border-radius:16px;padding:30px;box-shadow:0 2px 8px rgba(0,0,0,0.08);text-align:center;">
        <div style="font-size:64px;margin-bottom:15px;">👋</div>
        <h1 style="font-size:24px;font-weight:700;color:#1e3a8a;">Selamat Datang, Admin!</h1>
        <p style="color:#64748b;margin-top:8px;">Gunakan menu di sidebar untuk mengelola sistem Educounsel.</p>
        <a href="{{ route('admin.dashboard') }}" style="display:inline-block;margin-top:20px;padding:12px 24px;background:#1e3a8a;color:white;border-radius:10px;text-decoration:none;font-weight:600;">Ke Dashboard →</a>
    </div>
</div>
@endsection
