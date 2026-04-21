@extends('layouts.app-guru-bk')

@section('title', 'Manajemen Konseling')

@section('content')
<div class="p-6 pt-6">
    <!-- Header Banner -->
    <div class="bg-purple-100 rounded-2xl p-5 mb-6 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <button onclick="window.history.back()" class="w-8 h-8 bg-white rounded-lg flex items-center justify-center hover:bg-gray-50 transition">
                <i class="fas fa-arrow-left text-purple-700 text-sm"></i>
            </button>
            <div>
                <h1 class="text-xl font-bold text-gray-800">Manajemen Konseling</h1>
                <p class="text-gray-600 text-xs">Cek jadwal konseling di halaman ini.</p>
            </div>
        </div>
        <!-- Ilustrasi 3D Chat -->
        <div class="hidden md:block">
            <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-pink-400 rounded-2xl flex items-center justify-center relative">
                <div class="absolute -top-1 -left-1 w-6 h-6 bg-yellow-400 rounded-full"></div>
                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-blue-400 rounded-full"></div>
                <div class="absolute top-2 -right-2 w-4 h-4 bg-green-400 rounded-full"></div>
                <i class="fas fa-comment-dots text-white text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-8">
            <!-- Date Card -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="bg-yellow-100 border-2 border-yellow-400 rounded-2xl p-4 text-center">
                        <div class="text-4xl font-bold text-gray-800">10</div>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-800">Jumat, 10 Oktober 2025</p>
                        <p class="text-sm text-gray-500">1 Jadwal Konseling</p>
                    </div>
                </div>
            </div>

            <!-- Agenda Konseling Card -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <h2 class="text-xl font-bold text-purple-600 mb-6">Agenda Konseling</h2>

                <!-- Status Bar Modern -->
                <div class="bg-white rounded-2xl shadow-md p-2 mb-6 flex gap-2">
                    <button onclick="filterStatus('menunggu')" id="btn-menunggu" class="status-tab px-5 py-2.5 text-white rounded-xl font-medium flex items-center gap-2 transition-all shadow-sm hover:shadow-md active" style="background-color: #8000FF;">
                        <span class="text-base">⏱️</span>
                        <span>Menunggu</span>
                    </button>
                    <button onclick="filterStatus('disetujui')" id="btn-disetujui" class="status-tab px-5 py-2.5 bg-gray-100 text-gray-500 rounded-xl font-medium flex items-center gap-2 transition-all hover:bg-gray-200 hover:text-gray-700">
                        <span class="text-base">✔</span>
                        <span>Disetujui</span>
                    </button>
                    <button onclick="filterStatus('dibatalkan')" id="btn-dibatalkan" class="status-tab px-5 py-2.5 bg-gray-100 text-gray-500 rounded-xl font-medium flex items-center gap-2 transition-all hover:bg-gray-200 hover:text-gray-700">
                        <span class="text-base">✖</span>
                        <span>Dibatalkan</span>
                    </button>
                    <button onclick="filterStatus('selesai')" id="btn-selesai" class="status-tab px-5 py-2.5 bg-gray-100 text-gray-500 rounded-xl font-medium flex items-center gap-2 transition-all hover:bg-gray-200 hover:text-gray-700">
                        <span class="text-base">💬</span>
                        <span>Selesai</span>
                    </button>
                </div>

                <!-- Container untuk semua card konseling -->
                <div id="konselingContainer">
                    <!-- Card Konseling - Menunggu -->
                    <div id="card-1" class="konseling-card border border-gray-200 rounded-2xl p-6 relative bg-white mb-4" data-status="menunggu">
                    <!-- Status Badge -->
                    <div class="absolute top-4 right-4">
                        <div class="bg-orange-100 text-orange-600 px-5 py-2 rounded-full text-sm font-semibold flex items-center gap-2 border border-orange-300">
                            <i class="far fa-clock"></i>
                            Menunggu
                        </div>
                    </div>

                    <!-- Student Info dengan Progress Bar -->
                    <div class="mb-6">
                        <div class="flex items-start gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Hidayatul+Mustanam&background=7C3AED&color=fff&size=80" 
                                 alt="Avatar" 
                                 class="w-14 h-14 rounded-full">
                            <div class="flex-1">
                                <div class="flex items-baseline gap-2">
                                    <h3 class="font-bold text-gray-900 text-base">Hidayatul Mustanam</h3>
                                    <span class="text-sm text-gray-500">11-RPL</span>
                                </div>
                            </div>
                        </div>
                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>

                    <!-- Guru BK Section -->
                    <div class="mb-5">
                        <p class="text-xs text-gray-500 font-medium mb-1">Guru BK</p>
                        <p class="font-semibold text-gray-900 text-base">Bu Eka</p>
                    </div>

                    <!-- Cerita Singkat Permasalahan -->
                    <div class="mb-6">
                        <p class="text-xs text-gray-500 font-medium mb-2">Cerita Singkat Permasalahan</p>
                        <p class="text-sm text-gray-800 leading-relaxed mb-1">
                            Saya merasa tidak punya semangat hidup semenjak saya diputuskan pacar saya..
                        </p>
                        <a href="javascript:void(0)" onclick="openDetailModal('card-1')" class="text-purple-600 text-sm font-semibold hover:underline">Lihat Detail</a>
                    </div>

                    <!-- Badges Info - 4 kolom sejajar -->
                    <div class="mb-6">
                        <!-- Labels -->
                        <div class="grid grid-cols-4 gap-2 mb-2">
                            <p class="text-xs text-gray-500 font-medium">Metode Konseling</p>
                            <p class="text-xs text-gray-500 font-medium">Jenis Konseling</p>
                            <p class="text-xs text-gray-500 font-medium">Tanggal</p>
                            <p class="text-xs text-gray-500 font-medium">Jam</p>
                        </div>
                        
                        <!-- Badges -->
                        <div class="grid grid-cols-4 gap-2">
                            <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-indigo-700 rounded-lg text-xs font-semibold border border-indigo-300">
                                <i class="fas fa-user-friends text-xs"></i>
                                <span>Konseling Offline</span>
                            </span>
                            <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-indigo-700 rounded-lg text-xs font-semibold border border-indigo-300">
                                <i class="fas fa-user text-xs"></i>
                                <span>Konseling Individu</span>
                            </span>
                            <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-purple-700 rounded-lg text-xs font-semibold border border-purple-300">
                                <i class="far fa-calendar text-xs"></i>
                                <span>Jumat, 10 - Okt - 2025</span>
                            </span>
                            <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-purple-700 rounded-lg text-xs font-semibold border border-purple-300">
                                <i class="far fa-clock text-xs"></i>
                                <span>08.30 - 09.00 AM</span>
                            </span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-3 mt-6">
                        <button onclick="approveKonseling('card-1')" class="px-8 py-2.5 bg-green-500 hover:bg-green-600 text-white rounded-xl font-semibold transition-all shadow-sm">
                            Setujui
                        </button>
                        <button onclick="rejectKonseling('card-1')" class="px-8 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-xl font-semibold transition-all shadow-sm">
                            Tolak
                        </button>
                    </div>
                </div>

                <!-- Card Konseling - Disetujui (Contoh) -->
                <div class="konseling-card border border-gray-200 rounded-2xl p-6 relative bg-white mb-4 hidden" data-status="disetujui">
                    <div class="absolute top-4 right-4">
                        <div class="bg-green-100 text-green-600 px-5 py-2 rounded-full text-sm font-semibold flex items-center gap-2 border border-green-300">
                            <i class="fas fa-check"></i>
                            Disetujui
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex items-start gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Syarif&background=10B981&color=fff&size=80" alt="Avatar" class="w-14 h-14 rounded-full">
                            <div class="flex-1">
                                <div class="flex items-baseline gap-2">
                                    <h3 class="font-bold text-gray-900 text-base">Ahmad Syarif</h3>
                                    <span class="text-sm text-gray-500">12-TKJ</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <p class="text-xs text-gray-500 font-medium mb-1">Guru BK</p>
                        <p class="font-semibold text-gray-900 text-base">Bu Eka</p>
                    </div>
                    <div class="mb-6">
                        <p class="text-xs text-gray-500 font-medium mb-2">Cerita Singkat Permasalahan</p>
                        <p class="text-sm text-gray-800 leading-relaxed mb-1">Konseling sudah disetujui dan terjadwalkan.</p>
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                        <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-indigo-700 rounded-lg text-xs font-semibold border border-indigo-300">
                            <i class="fas fa-video text-xs"></i>
                            <span>Online</span>
                        </span>
                        <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-indigo-700 rounded-lg text-xs font-semibold border border-indigo-300">
                            <i class="fas fa-user text-xs"></i>
                            <span>Individu</span>
                        </span>
                        <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-purple-700 rounded-lg text-xs font-semibold border border-purple-300">
                            <i class="far fa-calendar text-xs"></i>
                            <span>12 - Nov - 2025</span>
                        </span>
                        <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-purple-700 rounded-lg text-xs font-semibold border border-purple-300">
                            <i class="far fa-clock text-xs"></i>
                            <span>10.00 - 11.00 AM</span>
                        </span>
                    </div>
                </div>

                <!-- Card Konseling - Dibatalkan (Contoh) -->
                <div class="konseling-card border border-gray-200 rounded-2xl p-6 relative bg-white mb-4 hidden" data-status="dibatalkan">
                    <div class="absolute top-4 right-4">
                        <div class="bg-red-100 text-red-600 px-5 py-2 rounded-full text-sm font-semibold flex items-center gap-2 border border-red-300">
                            <i class="fas fa-times"></i>
                            Dibatalkan
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="flex items-start gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=EF4444&color=fff&size=80" alt="Avatar" class="w-14 h-14 rounded-full">
                            <div class="flex-1">
                                <div class="flex items-baseline gap-2">
                                    <h3 class="font-bold text-gray-900 text-base">Siti Nurhaliza</h3>
                                    <span class="text-sm text-gray-500">11-MM</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-red-600 h-2 rounded-full" style="width: 25%"></div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <p class="text-xs text-gray-500 font-medium mb-1">Guru BK</p>
                        <p class="font-semibold text-gray-900 text-base">Bu Eka</p>
                    </div>
                    <div class="mb-6">
                        <p class="text-xs text-gray-500 font-medium mb-2">Cerita Singkat Permasalahan</p>
                        <p class="text-sm text-gray-800 leading-relaxed mb-1">Konseling dibatalkan karena tidak sesuai jadwal.</p>
                    </div>
                </div>

                <!-- Card Konseling - Selesai (Contoh) -->
                <div class="konseling-card border border-gray-200 rounded-2xl p-6 relative bg-white mb-4 hidden" data-status="selesai">
                    <!-- Status Badge -->
                    <div class="absolute top-4 right-4">
                        <div class="bg-green-100 text-green-600 px-5 py-2 rounded-full text-sm font-semibold flex items-center gap-2 border border-green-300">
                            <i class="fas fa-check-circle"></i>
                            Selesai
                        </div>
                    </div>

                    <!-- Student Info dengan Progress Bar -->
                    <div class="mb-6">
                        <div class="flex items-start gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Hidayatul+Mustanam&background=7C3AED&color=fff&size=80" 
                                 alt="Avatar" 
                                 class="w-14 h-14 rounded-full">
                            <div class="flex-1">
                                <div class="flex items-baseline gap-2">
                                    <h3 class="font-bold text-gray-900 text-base">Hidayatul Mustanam</h3>
                                    <span class="text-sm text-gray-500">11-RPL</span>
                                </div>
                            </div>
                        </div>
                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-600 h-2 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>

                    <!-- Guru BK Section -->
                    <div class="mb-5">
                        <p class="text-xs text-gray-500 font-medium mb-1">Guru BK</p>
                        <p class="font-semibold text-gray-900 text-base">Bu Eka</p>
                    </div>

                    <!-- Cerita Singkat Permasalahan -->
                    <div class="mb-6">
                        <p class="text-xs text-gray-500 font-medium mb-2">Cerita Singkat Permasalahan</p>
                        <p class="text-sm text-gray-800 leading-relaxed mb-1">
                            Saya merasa tidak punya semangat hidup semenjak saya diputuskan pacar saya..
                        </p>
                        <a href="javascript:void(0)" onclick="openDetailModal('card-selesai')" class="text-purple-600 text-sm font-semibold hover:underline">Lihat Detail</a>
                    </div>

                    <!-- Badges Info - 4 kolom sejajar -->
                    <div class="mb-6">
                        <!-- Labels -->
                        <div class="grid grid-cols-4 gap-2 mb-2">
                            <p class="text-xs text-gray-500 font-medium">Metode Konseling</p>
                            <p class="text-xs text-gray-500 font-medium">Jenis Konseling</p>
                            <p class="text-xs text-gray-500 font-medium">Tanggal</p>
                            <p class="text-xs text-gray-500 font-medium">Jam</p>
                        </div>
                        
                        <!-- Badges -->
                        <div class="grid grid-cols-4 gap-2">
                            <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-indigo-700 rounded-lg text-xs font-semibold border border-indigo-300">
                                <i class="fas fa-user-friends text-xs"></i>
                                <span>Konseling Offline</span>
                            </span>
                            <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-indigo-700 rounded-lg text-xs font-semibold border border-indigo-300">
                                <i class="fas fa-user text-xs"></i>
                                <span>Konseling Individu</span>
                            </span>
                            <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-purple-700 rounded-lg text-xs font-semibold border border-purple-300">
                                <i class="far fa-calendar text-xs"></i>
                                <span>Jumat, 10 - Oktober - 2025</span>
                            </span>
                            <span class="inline-flex items-center justify-center gap-1.5 px-2 py-2 bg-white text-purple-700 rounded-lg text-xs font-semibold border border-purple-300">
                                <i class="far fa-clock text-xs"></i>
                                <span>08.30 - 09.00 AM</span>
                            </span>
                        </div>
                    </div>

                    <!-- Button Laporan Konseling -->
                    <div class="flex justify-end">
                        <button onclick="window.location.href='{{ route('guru_bk.konseling.hasil') }}'" class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold transition-all shadow-sm flex items-center gap-2">
                            <i class="fas fa-plus-circle"></i>
                            Laporan Konseling
                        </button>
                    </div>
                </div>

                <!-- Empty State -->
                <div id="emptyState" class="hidden text-center py-12">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-inbox text-6xl"></i>
                    </div>
                    <p class="text-gray-500 font-medium">Tidak ada konseling dengan status ini</p>
                </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="lg:col-span-4">
            <!-- Calendar Widget -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                <!-- Calendar Header -->
                <div class="flex items-center justify-between mb-6">
                    <button class="p-2 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-chevron-left text-gray-600"></i>
                    </button>
                    <h3 class="text-base font-bold text-gray-900">November 2024</h3>
                    <button class="p-2 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-chevron-right text-gray-600"></i>
                    </button>
                </div>

                <!-- Weekdays -->
                <div class="grid grid-cols-7 gap-2 mb-2">
                    <div class="text-center text-xs font-semibold text-gray-500">Su</div>
                    <div class="text-center text-xs font-semibold text-gray-500">Mo</div>
                    <div class="text-center text-xs font-semibold text-gray-500">Tu</div>
                    <div class="text-center text-xs font-semibold text-gray-500">We</div>
                    <div class="text-center text-xs font-semibold text-gray-500">Th</div>
                    <div class="text-center text-xs font-semibold text-gray-500">Fr</div>
                    <div class="text-center text-xs font-semibold text-gray-500">Sa</div>
                </div>

                <!-- Calendar Days -->
                <div class="grid grid-cols-7 gap-2">
                    @php
                        $days = [
                            ['30', 'prev'], ['31', 'prev'], ['1', ''], ['2', ''], ['3', ''], ['4', ''], ['5', ''],
                            ['6', ''], ['7', ''], ['8', 'active'], ['9', ''], ['10', 'today'], ['11', ''], ['12', ''],
                            ['13', ''], ['14', ''], ['15', ''], ['16', ''], ['17', ''], ['18', ''], ['19', ''],
                            ['20', ''], ['21', ''], ['22', ''], ['23', ''], ['24', ''], ['25', ''], ['26', ''],
                            ['27', ''], ['28', ''], ['29', ''], ['30', ''], ['1', 'next'], ['2', 'next'], ['3', 'next']
                        ];
                    @endphp
                    @foreach($days as [$day, $class])
                        @if($class === 'active')
                            <div class="aspect-square flex items-center justify-center bg-purple-600 text-white rounded-lg text-sm font-bold cursor-pointer">
                                {{ $day }}
                            </div>
                        @elseif($class === 'today')
                            <div class="aspect-square flex items-center justify-center bg-yellow-100 border-2 border-yellow-400 text-gray-900 rounded-lg text-sm font-bold cursor-pointer">
                                {{ $day }}
                            </div>
                        @elseif($class === 'prev' || $class === 'next')
                            <div class="aspect-square flex items-center justify-center text-gray-300 text-sm">
                                {{ $day }}
                            </div>
                        @else
                            <div class="aspect-square flex items-center justify-center hover:bg-gray-100 rounded-lg text-sm font-medium text-gray-800 cursor-pointer">
                                {{ $day }}
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Calendar Actions -->
                <div class="flex gap-2 mt-6">
                    <button class="flex-1 px-4 py-2 bg-purple-100 text-purple-700 rounded-lg font-medium hover:bg-purple-200 transition">
                        Semua Waktu
                    </button>
                    <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition">
                        Batal
                    </button>
                    <button class="px-6 py-2 bg-purple-600 text-white rounded-lg font-medium hover:bg-purple-700 transition">
                        Oke
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Permasalahan -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 p-4">
        <div class="flex items-center justify-center min-h-full">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detail Permasalahan</h2>
                
                <div class="mb-6">
                    <p class="text-sm text-gray-800 leading-relaxed">
                        Saya merasa tidak punya semangat hidup semenjak saya diputuskan pacar saya.
                        Sejak saya diputuskan oleh pacar saya dua minggu lalu, saya sering merasa sedih dan tidak bersemangat.
                        <br><br>
                        Saya jadi malas masuk sekolah, tugas-tugas sering terlambat, dan saya tidak fokus di malam hari. 
                        Dulu saya sering tertawa ke dia tentang masalah sekolah, tapi sekarang saya merasa sendirian. 
                        Saya tahu harusnya saya bisa move on, tapi setiap kali mencoba, rasanya makin berat.
                        <br><br>
                        Saya hanya ingin bisa kembali seperti dulu — bisa senang kumpul sama teman, dan gak terus makin hal ini.
                    </p>
                </div>

                <div class="flex justify-end">
                    <button type="button" onclick="closeDetailModal()" class="px-8 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold transition-all shadow-sm">
                        Kembali
                    </button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Approve Konseling
function approveKonseling(cardId) {
    if (!confirm('Apakah Anda yakin ingin menyetujui konseling ini?')) {
        return;
    }
    
    const card = document.getElementById(cardId);
    
    // Update status data
    card.dataset.status = 'disetujui';
    
    // Update badge status
    const badge = card.querySelector('.absolute.top-4.right-4 > div');
    badge.className = 'bg-green-100 text-green-600 px-5 py-2 rounded-full text-sm font-semibold flex items-center gap-2 border border-green-300';
    badge.innerHTML = '<i class="fas fa-check"></i> Disetujui';
    
    // Update progress bar color
    const progressBar = card.querySelector('.w-full.bg-gray-200.rounded-full.h-2 > div');
    if (progressBar) {
        progressBar.className = 'bg-green-600 h-2 rounded-full';
        progressBar.style.width = '100%';
    }
    
    // Remove action buttons
    const actionButtons = card.querySelector('.flex.justify-end.gap-3');
    if (actionButtons) {
        actionButtons.remove();
    }
    
    // Show success message
    alert('Konseling berhasil disetujui!');
    
    // Switch to disetujui tab
    filterStatus('disetujui');
}

// Reject Konseling
function rejectKonseling(cardId) {
    if (!confirm('Apakah Anda yakin ingin menolak konseling ini?')) {
        return;
    }
    
    const card = document.getElementById(cardId);
    
    // Update status data
    card.dataset.status = 'dibatalkan';
    
    // Update badge status
    const badge = card.querySelector('.absolute.top-4.right-4 > div');
    badge.className = 'bg-red-100 text-red-600 px-5 py-2 rounded-full text-sm font-semibold flex items-center gap-2 border border-red-300';
    badge.innerHTML = '<i class="fas fa-times"></i> Dibatalkan';
    
    // Update progress bar color
    const progressBar = card.querySelector('.w-full.bg-gray-200.rounded-full.h-2 > div');
    if (progressBar) {
        progressBar.className = 'bg-red-600 h-2 rounded-full';
        progressBar.style.width = '25%';
    }
    
    // Remove action buttons
    const actionButtons = card.querySelector('.flex.justify-end.gap-3');
    if (actionButtons) {
        actionButtons.remove();
    }
    
    // Show rejection message
    alert('Konseling telah ditolak.');
    
    // Switch to dibatalkan tab
    filterStatus('dibatalkan');
}

// Filter Status Function
function filterStatus(status) {
    // Get all konseling cards
    const cards = document.querySelectorAll('.konseling-card');
    const emptyState = document.getElementById('emptyState');
    let hasVisibleCard = false;
    
    // Hide all cards first
    cards.forEach(card => {
        if (card.dataset.status === status) {
            card.classList.remove('hidden');
            hasVisibleCard = true;
        } else {
            card.classList.add('hidden');
        }
    });
    
    // Show/hide empty state
    if (!hasVisibleCard) {
        emptyState.classList.remove('hidden');
    } else {
        emptyState.classList.add('hidden');
    }
    
    // Update active tab styling
    const tabs = document.querySelectorAll('.status-tab');
    tabs.forEach(tab => {
        tab.classList.remove('active');
        tab.classList.remove('text-white');
        tab.classList.add('bg-gray-100', 'text-gray-500');
        tab.style.backgroundColor = '';
    });
    
    // Set active tab
    const activeTab = document.getElementById(`btn-${status}`);
    activeTab.classList.add('active');
    activeTab.classList.remove('bg-gray-100', 'text-gray-500');
    activeTab.classList.add('text-white');
    
    // Set specific color for each status
    if (status === 'menunggu') {
        activeTab.style.backgroundColor = '#8000FF';
    } else if (status === 'disetujui') {
        activeTab.style.backgroundColor = '#10B981';
    } else if (status === 'dibatalkan') {
        activeTab.style.backgroundColor = '#EF4444';
    } else if (status === 'selesai') {
        activeTab.style.backgroundColor = '#3B82F6';
    }
}

function openDetailModal(cardId) {
    document.getElementById('detailModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking on backdrop
document.getElementById('detailModal')?.addEventListener('click', function(e) {
    if (e.target.id === 'detailModal') {
        closeDetailModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDetailModal();
    }
});
</script>
@endpush

@endsection