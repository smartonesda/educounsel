@extends('layouts.app')

@section('title', 'Buat Janji Konseling - Educounsel')

@section('content')
<div style="max-width:700px;margin:40px auto;padding:0 20px;">
    <div style="background:white;border-radius:20px;padding:35px;box-shadow:0 4px 20px rgba(0,0,0,0.08);">
        <h1 style="font-size:24px;font-weight:700;color:#1e3a8a;margin-bottom:5px;">🗓️ Buat Janji Konseling</h1>
        <p style="color:#64748b;margin-bottom:25px;">Isi formulir di bawah untuk mengajukan janji konseling</p>

        @if($errors->any())
        <div style="background:#fee2e2;border:1px solid #fca5a5;border-radius:10px;padding:15px;margin-bottom:20px;color:#b91c1c;">
            @foreach($errors->all() as $error)
            <p>❌ {{ $error }}</p>
            @endforeach
        </div>
        @endif

        <form action="{{ route('student.appointments.store') }}" method="POST">
            @csrf
            <div style="margin-bottom:20px;">
                <label style="display:block;font-size:14px;font-weight:600;color:#374151;margin-bottom:8px;">Tanggal Janji</label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                    style="width:100%;padding:12px 15px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:14px;color:#1f2937;outline:none;">
            </div>
            <div style="margin-bottom:25px;">
                <label style="display:block;font-size:14px;font-weight:600;color:#374151;margin-bottom:8px;">Keterangan (Opsional)</label>
                <textarea name="keterangan" rows="4" placeholder="Ceritakan secara singkat tujuan konseling Anda..."
                    style="width:100%;padding:12px 15px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:14px;color:#1f2937;outline:none;resize:vertical;">{{ old('keterangan') }}</textarea>
            </div>
            <div style="display:flex;gap:12px;">
                <a href="{{ route('student.appointments.index') }}" style="flex:1;display:block;text-align:center;padding:12px;border:1.5px solid #e5e7eb;border-radius:10px;color:#374151;text-decoration:none;font-weight:600;">Batal</a>
                <button type="submit" style="flex:1;padding:12px;background:linear-gradient(135deg,#1e3a8a,#3730a3);color:white;border:none;border-radius:10px;font-weight:600;cursor:pointer;">Kirim Permohonan</button>
            </div>
        </form>
    </div>
</div>
@endsection
