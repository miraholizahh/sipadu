<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F7F8F0] min-h-screen font-poppins">
    <x-navbar />

    <div class="max-w-5xl mx-auto px-4 py-10">
        <div class="bg-white shadow-md rounded-xl p-8">
            <h1 class="text-3xl font-bold text-[#2D3748] mb-8 text-center">Hasil Diagnosa DBD</h1>

            @php
                if (!function_exists('interpretasiKemungkinan')) {
                    function interpretasiKemungkinan($percent) {
                        if ($percent == 100) return "Sangat Yakin";
                        elseif ($percent >= 80) return "Kemungkinan Besar";
                        elseif ($percent >= 51) return "Kemungkinan";
                        elseif ($percent >= 0) return "Sedikit Kemungkinan";
                        else return "Tidak Diketahui";
                    }
                }
            @endphp

            @if ($diagnosis)
                <!-- Tabel Informasi Pasien dan Hasil Diagnosa -->
                <div class="overflow-x-auto mb-6">
                    <table class="min-w-full text-sm text-left text-gray-700 border border-gray-300">
                        <tbody>
                            <tr class="bg-[#E2E8F0]">
                                <th class="py-3 px-4 font-medium w-1/3 border">Nama</th>
                                <td class="py-3 px-4 border">{{ $diagnosis->user->nama ?? '-' }}</td>
                            </tr>
                            <tr class="bg-white">
                                <th class="py-3 px-4 font-medium border">Jenis Kelamin</th>
                                <td class="py-3 px-4 border">{{ $diagnosis->user->jenis_kelamin ?? '-' }}</td>
                            </tr>
                            <tr class="bg-[#E2E8F0]">
                                <th class="py-3 px-4 font-medium border">Tanggal Diagnosa</th>
                                <td class="py-3 px-4 border">
                                    {{ \Carbon\Carbon::parse($diagnosis->tanggal_diagnosa)->format('d-m-Y H:i') }}
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <th class="py-3 px-4 font-medium border">Penyakit</th>
                                <td class="py-3 px-4 border">{{ $diagnosis->disease->nama_penyakit ?? 'Tidak diketahui' }}</td>
                            </tr>
                            <tr class="bg-[#E2E8F0]">
                                <th class="py-3 px-4 font-medium border">Hasil Kemungkinan</th>
                                <td class="py-3 px-4 border">
                                    {{ $diagnosis->hasil_diagnosa ?? '-' }}%
                                    ({{ interpretasiKemungkinan($diagnosis->hasil_diagnosa) }})
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Solusi -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Solusi:</h2>
                    @if ($diagnosis->disease && $diagnosis->disease->solutions && $diagnosis->disease->solutions->count() > 0)
                        <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                            @foreach ($diagnosis->disease->solutions as $solution)
                                <li>{{ $solution->solusi }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-gray-600">Tidak ada solusi tersedia.</p>
                    @endif
                </div>

                <!-- Gejala -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Gejala yang Dipilih:</h2>
                    <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                        @foreach ($diagnosis->symptom as $symptom)
                            <li>{{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Tombol -->
                <form method="GET" action="{{ route('diagnosis.form') }}" class="text-center mt-8">
                    <button type="submit"
                        class="bg-[#4A5568] hover:bg-[#2D3748] text-white font-semibold py-2 px-6 rounded-md transition duration-200">
                        Selesai
                    </button>
                </form>
            @else
                <p class="text-gray-600 text-base">Hasil diagnosa tidak tersedia.</p>
            @endif
        </div>
    </div>
</body>
</html>
