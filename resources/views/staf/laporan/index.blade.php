<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Diagnosa Penyakit Pasien</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-navbar />

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">

                    @php
                        function interpretasiKemungkinan($percent) {
                            if ($percent == 100) {
                                return "Sangat Yakin";
                            } elseif ($percent >= 80) {
                                return "Kemungkinan Besar";
                            } elseif ($percent >= 51) {
                                return "Kemungkinan";
                            } elseif ($percent >= 0) {
                                return "Sedikit Kemungkinan";
                            } else {
                                return "Tidak Diketahui";
                            }
                        }
                    @endphp

                    <div class="text-left text-2xl font-semibold mb-6">
                        {{ __('Laporan Diagnosa Penyakit Pasien') }}
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-white text-sm text-left">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">Jenis Kelamin</th>
                                    <th class="border px-4 py-2">Tanggal</th>
                                    <th class="border px-4 py-2">Penyakit</th>
                                    <th class="border px-4 py-2">Kemungkinan</th>
                                    <th class="border px-4 py-2">Solusi</th>
                                    <th class="border px-4 py-2">Gejala</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">
                                @php $no = 1; @endphp
                                @forelse ($diagnosis as $item)
                                    <tr class="bg-gray-700 hover:bg-gray-600">
                                        <td class="border px-4 py-2">{{ $no++ }}</td>
                                        <td class="border px-4 py-2">{{ $item->user->nama ?? '-' }}</td>
                                        <td class="border px-4 py-2">{{ $item->user->jenis_kelamin ?? '-' }}</td>
                                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal_diagnosa)->format('d-m-Y') }}</td>
                                        <td class="border px-4 py-2">{{ $item->disease->nama_penyakit ?? '-' }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $item->hasil_diagnosa ?? '-' }}%
                                            ({{ interpretasiKemungkinan($item->hasil_diagnosa) }})
                                        </td>
                                        <td class="border px-4 py-2">{{ $item->disease->solusi ?? '-' }}</td>
                                        <td class="border px-4 py-2">
                                            <ul class="list-disc list-inside text-sm">
                                                @foreach ($item->symptom as $symptom)
                                                    <li>{{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center bg-gray-600 text-white">
                                        <td colspan="8" class="border px-4 py-2">
                                            Tidak ada riwayat diagnosa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
