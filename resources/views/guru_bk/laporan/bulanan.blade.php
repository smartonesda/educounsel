@extends('layouts.app-guru-bk')

@section('title', 'Laporan Bulanan - Guru BK')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-white to-purple-50 py-8">
    <div class="max-w-[1600px] mx-auto px-4">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        <i class="fas fa-calendar-alt text-purple-600 mr-3"></i>
                        Laporan Bulanan
                    </h1>
                    <p class="text-gray-600">Laporan bimbingan konseling per bulan dan kelas</p>
                </div>
                <a href="{{ route('guru_bk.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        <div class="flex gap-6">
            <!-- Main Content -->
            <div class="flex-1">
                <!-- Filter Card -->
                <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-filter text-purple-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Filter Laporan</h2>
                    </div>

                    <form method="POST" action="{{ route('guru_bk.laporan.bulanan') }}" id="filterForm">
                        @csrf
                        
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <!-- Bulan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-calendar text-purple-600 mr-1"></i>
                                    Bulan
                                </label>
                                <select name="bulan" id="bulan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    <option value="">Pilih Bulan</option>
                                    <option value="01" {{ old('bulan', $bulan ?? '') == '01' ? 'selected' : '' }}>Januari</option>
                                    <option value="02" {{ old('bulan', $bulan ?? '') == '02' ? 'selected' : '' }}>Februari</option>
                                    <option value="03" {{ old('bulan', $bulan ?? '') == '03' ? 'selected' : '' }}>Maret</option>
                                    <option value="04" {{ old('bulan', $bulan ?? '') == '04' ? 'selected' : '' }}>April</option>
                                    <option value="05" {{ old('bulan', $bulan ?? '') == '05' ? 'selected' : '' }}>Mei</option>
                                    <option value="06" {{ old('bulan', $bulan ?? '') == '06' ? 'selected' : '' }}>Juni</option>
                                    <option value="07" {{ old('bulan', $bulan ?? '') == '07' ? 'selected' : '' }}>Juli</option>
                                    <option value="08" {{ old('bulan', $bulan ?? '') == '08' ? 'selected' : '' }}>Agustus</option>
                                    <option value="09" {{ old('bulan', $bulan ?? '') == '09' ? 'selected' : '' }}>September</option>
                                    <option value="10" {{ old('bulan', $bulan ?? '') == '10' ? 'selected' : '' }}>Oktober</option>
                                    <option value="11" {{ old('bulan', $bulan ?? '') == '11' ? 'selected' : '' }}>November</option>
                                    <option value="12" {{ old('bulan', $bulan ?? '') == '12' ? 'selected' : '' }}>Desember</option>
                                </select>
                            </div>

                            <!-- Tahun Ajaran -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-graduation-cap text-purple-600 mr-1"></i>
                                    Tahun Ajaran
                                </label>
                                <select name="tahun" id="tahun" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    <option value="">Pilih Tahun Ajaran</option>
                                    @foreach($tahunAjaranList as $ta)
                                        <option value="{{ $ta->tahun_ajaran }}" {{ old('tahun', $tahun ?? '') == $ta->tahun_ajaran ? 'selected' : '' }}>
                                            {{ $ta->tahun_ajaran }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Kelas -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-school text-purple-600 mr-1"></i>
                                    Kelas
                                </label>
                                <select name="kelas_id" id="kelas" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    <option value="">Pilih Kelas</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" id="submitBtn" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 shadow-sm">
                            <span id="btnText">
                                <i class="fas fa-file-alt mr-2"></i> Generate Laporan
                            </span>
                            <span id="btnLoading" class="hidden">
                                <i class="fas fa-spinner fa-spin mr-2"></i> Memuat...
                            </span>
                        </button>
                    </form>
                </div>

                <!-- Filter Info Bar - Only show after submit -->
                @if($bulan && $tahun && $kelasId)
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                            <span class="font-bold text-blue-900">Filter yang Diterapkan:</span>
                        </div>
                        <div class="grid grid-cols-3 gap-4 text-sm">
                            <div>
                                <span class="text-gray-600">Bulan:</span>
                                <span class="font-semibold text-gray-900 ml-2">
                                    {{ ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'][$bulan] ?? $bulan }}
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-600">Tahun:</span>
                                <span class="font-semibold text-gray-900 ml-2">{{ $tahun }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Jumlah Siswa:</span>
                                <span class="font-semibold {{ $siswaList->count() > 0 ? 'text-green-600' : 'text-red-600' }} ml-2">
                                    {{ $siswaList->count() }} siswa
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
                
                <!-- Table ALWAYS visible (even before generate) -->
                <div class="overflow-hidden rounded-lg border-2 border-gray-300">
                    <table class="w-full border-collapse">
                        <thead class="bg-purple-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold w-20 border-r border-purple-500">No</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold border-r border-purple-500">Nama Siswa</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold border-r border-purple-500">Kelas</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold w-32">Jumlah Konseling</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($siswaList as $index => $siswa)
                            <tr class="hover:bg-gray-50 transition-colors border-b border-gray-300">
                                <td class="px-6 py-4 text-sm text-gray-900 border-r border-gray-300">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 border-r border-gray-300">{{ $siswa->nama }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 border-r border-gray-300">{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm text-center">
                                    <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-sm font-semibold {{ $siswa->jumlah_konseling > 0 ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-500' }}">
                                        {{ $siswa->jumlah_konseling ?? 0 }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Data Kosong</h3>
                                        <p class="text-sm text-gray-500">Tidak ada siswa untuk filter yang dipilih</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                            <!-- Summary Row with proper borders (only show if data exists) -->
                            @if($siswaList->count() > 0)
                            <tr class="bg-purple-50 font-semibold border-t-2 border-purple-600">
                                <td colspan="3" class="px-6 py-4 text-sm text-gray-900 border-r border-gray-300">
                                    <div class="flex justify-between items-center">
                                        <span>Total Statistik:</span>
                                        <span class="text-xs text-gray-600">
                                            Kenyamanan: {{ $statistik['kenyamanan'] ?? 0 }} | 
                                            Sosial: {{ $statistik['sosial'] ?? 0 }} | 
                                            Belajar: {{ $statistik['belajar'] ?? 0 }} | 
                                            Lain-Lain: {{ $statistik['lain_lain'] ?? 0 }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center">
                                    <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-sm font-semibold bg-purple-600 text-white">
                                        {{ array_sum($statistik) }}
                                    </span>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Export Buttons -->
                @if($siswaList->count() > 0)
                <div class="mt-6 flex gap-4">
                    <form method="POST" action="{{ route('guru_bk.laporan.exportPDF') }}" class="flex-1">
                        @csrf
                        <input type="hidden" name="bulan" value="{{ $bulan }}">
                        <input type="hidden" name="tahun" value="{{ $tahun }}">
                        <input type="hidden" name="kelas_id" value="{{ $kelasId }}">
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                            <i class="fas fa-file-pdf mr-2"></i> Export PDF
                        </button>
                    </form>
                    <form method="POST" action="{{ route('guru_bk.laporan.exportExcel') }}" class="flex-1">
                        @csrf
                        <input type="hidden" name="bulan" value="{{ $bulan }}">
                        <input type="hidden" name="tahun" value="{{ $tahun }}">
                        <input type="hidden" name="kelas_id" value="{{ $kelasId }}">
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                            <i class="fas fa-file-excel mr-2"></i> Export Excel
                        </button>
                    </form>
                </div>
                @endif
            </div>

            <!-- Right Sidebar - Statistik (only show when data exists) -->
            @if($siswaList->count() > 0)
            <div class="w-80 flex-shrink-0">
                <!-- Statistik Konseling Card -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-bold text-gray-800">Statistik Konseling</h2>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Kenyamanan -->
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm font-medium text-gray-700">Kenyamanan</span>
                                <span class="text-sm font-bold text-purple-600">{{ $statistik['kenyamanan'] ?? 0 }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-purple-600 h-2 rounded-full" style="width: {{ array_sum($statistik) > 0 ? (($statistik['kenyamanan'] ?? 0) / array_sum($statistik) * 100) : 0 }}%"></div>
                            </div>
                        </div>

                        <!-- Sosial -->
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm font-medium text-gray-700">Sosial</span>
                                <span class="text-sm font-bold text-blue-600">{{ $statistik['sosial'] ?? 0 }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: {{ array_sum($statistik) > 0 ? (($statistik['sosial'] ?? 0) / array_sum($statistik) * 100) : 0 }}%"></div>
                            </div>
                        </div>

                        <!-- Belajar -->
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm font-medium text-gray-700">Belajar</span>
                                <span class="text-sm font-bold text-green-600">{{ $statistik['belajar'] ?? 0 }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: {{ array_sum($statistik) > 0 ? (($statistik['belajar'] ?? 0) / array_sum($statistik) * 100) : 0 }}%"></div>
                            </div>
                        </div>

                        <!-- Lain-Lain -->
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm font-medium text-gray-700">Lain-Lain</span>
                                <span class="text-sm font-bold text-yellow-600">{{ $statistik['lain_lain'] ?? 0 }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-600 h-2 rounded-full" style="width: {{ array_sum($statistik) > 0 ? (($statistik['lain_lain'] ?? 0) / array_sum($statistik) * 100) : 0 }}%"></div>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <span class="text-base font-bold text-gray-900">Total</span>
                                <span class="text-xl font-bold text-purple-600">{{ array_sum($statistik) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
// Dynamic kelas loading based on tahun ajaran
document.getElementById('tahun').addEventListener('change', function() {
    const tahun = this.value;
    const kelasSelect = document.getElementById('kelas');
    
    if (!tahun) {
        kelasSelect.innerHTML = '<option value="">Pilih Kelas</option>';
        return;
    }
    
    fetch(`{{ route('guru_bk.laporan.getKelasList') }}?tahun=${tahun}`)
        .then(response => response.json())
        .then(data => {
            kelasSelect.innerHTML = '<option value="">Pilih Kelas</option>';
            data.forEach(kelas => {
                const option = document.createElement('option');
                option.value = kelas.id;
                option.textContent = kelas.label;
                option.selected = '{{ old("kelas_id", $kelasId ?? "") }}' == kelas.id;
                kelasSelect.appendChild(option);
            });
        });
});

// Trigger on page load if tahun is selected
if (document.getElementById('tahun').value) {
    document.getElementById('tahun').dispatchEvent(new Event('change'));
}

// Form submit loading state
document.getElementById('filterForm').addEventListener('submit', function() {
    document.getElementById('btnText').classList.add('hidden');
    document.getElementById('btnLoading').classList.remove('hidden');
    document.getElementById('submitBtn').disabled = true;
});
</script>
@endsection