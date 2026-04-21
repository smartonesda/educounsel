<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan Konseling</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
        }
        
        .header h1 {
            font-size: 18px;
            margin: 0 0 5px 0;
            color: #333;
        }
        
        .header h2 {
            font-size: 14px;
            margin: 0 0 10px 0;
            color: #666;
        }
        
        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }
        
        .info-table td {
            padding: 5px 10px;
            border: 1px solid #ddd;
        }
        
        .info-table .label {
            background-color: #f5f5f5;
            font-weight: bold;
            width: 150px;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        .data-table th,
        .data-table td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        
        .data-table th {
            background-color: #7C3AED;
            color: white;
            font-weight: bold;
            text-align: center;
        }
        
        .data-table .no {
            width: 40px;
            text-align: center;
        }
        
        .data-table .konseling {
            width: 80px;
            text-align: center;
        }
        
        .summary-row {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        
        .statistik {
            margin-top: 20px;
            page-break-inside: avoid;
        }
        
        .statistik h3 {
            font-size: 14px;
            margin-bottom: 10px;
            color: #333;
        }
        
        .stat-item {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            border-bottom: 1px dotted #ccc;
        }
        
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        
        .signature {
            margin-top: 60px;
            text-align: right;
        }
        
        .signature-line {
            border-bottom: 1px solid #333;
            width: 200px;
            margin: 40px 0 5px auto;
        }
        
        @media print {
            body {
                margin: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>LAPORAN BULANAN BIMBINGAN KONSELING</h1>
        <h2>SMK Antartika 1 Sidoarjo</h2>
        <p>Periode: {{ $bulan }} {{ $tahun }}</p>
    </div>

    <!-- Info Table -->
    <table class="info-table">
        <tr>
            <td class="label">Bulan</td>
            <td>{{ $bulan }}</td>
            <td class="label">Tahun Ajaran</td>
            <td>{{ $tahun }}</td>
        </tr>
        <tr>
            <td class="label">Kelas</td>
            <td>{{ $kelas }}</td>
            <td class="label">Tanggal Cetak</td>
            <td>{{ $tanggal_cetak }}</td>
        </tr>
        <tr>
            <td class="label">Total Siswa</td>
            <td>{{ $siswaList->count() }} siswa</td>
            <td class="label">Total Konseling</td>
            <td>{{ array_sum($statistik) }} sesi</td>
        </tr>
    </table>

    <!-- Data Table -->
    <table class="data-table">
        <thead>
            <tr>
                <th class="no">No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th class="konseling">Jumlah Konseling</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswaList as $index => $siswa)
            <tr>
                <td class="no">{{ $index + 1 }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                <td class="konseling">{{ $siswa->jumlah_konseling ?? 0 }}</td>
            </tr>
            @endforeach
            
            <!-- Summary Row -->
            <tr class="summary-row">
                <td colspan="3" style="text-align: right; padding-right: 10px;">
                    <strong>TOTAL KONSELING:</strong>
                </td>
                <td class="konseling">
                    <strong>{{ $siswaList->sum('jumlah_konseling') }}</strong>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Statistik -->
    <div class="statistik">
        <h3>STATISTIK KATEGORI KONSELING</h3>
        <table class="data-table" style="width: 50%;">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th style="width: 80px;">Jumlah</th>
                    <th style="width: 80px;">Persentase</th>
                </tr>
            </thead>
            <tbody>
                @php $total = array_sum($statistik); @endphp
                <tr>
                    <td>Kenyamanan</td>
                    <td style="text-align: center;">{{ $statistik['kenyamanan'] }}</td>
                    <td style="text-align: center;">{{ $total > 0 ? round(($statistik['kenyamanan'] / $total) * 100, 1) : 0 }}%</td>
                </tr>
                <tr>
                    <td>Sosial</td>
                    <td style="text-align: center;">{{ $statistik['sosial'] }}</td>
                    <td style="text-align: center;">{{ $total > 0 ? round(($statistik['sosial'] / $total) * 100, 1) : 0 }}%</td>
                </tr>
                <tr>
                    <td>Belajar</td>
                    <td style="text-align: center;">{{ $statistik['belajar'] }}</td>
                    <td style="text-align: center;">{{ $total > 0 ? round(($statistik['belajar'] / $total) * 100, 1) : 0 }}%</td>
                </tr>
                <tr>
                    <td>Lain-Lain</td>
                    <td style="text-align: center;">{{ $statistik['lain_lain'] }}</td>
                    <td style="text-align: center;">{{ $total > 0 ? round(($statistik['lain_lain'] / $total) * 100, 1) : 0 }}%</td>
                </tr>
                <tr class="summary-row">
                    <td><strong>TOTAL</strong></td>
                    <td style="text-align: center;"><strong>{{ $total }}</strong></td>
                    <td style="text-align: center;"><strong>100%</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Sidoarjo, {{ $tanggal_cetak }}</p>
        <div class="signature">
            <p>Guru Bimbingan Konseling</p>
            <div class="signature-line"></div>
            <p>{{ auth()->user()->nama ?? 'Guru BK' }}</p>
        </div>
    </div>
</body>
</html>
