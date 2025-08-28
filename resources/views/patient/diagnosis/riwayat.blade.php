<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Diagnosa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-poppins">
    <x-navbar />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-10">
        <div class="bg-white overflow-hidden shadow-xl rounded-xl p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Riwayat Diagnosa DBD</h1>

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

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white text-base text-left border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="border px-4 py-3">No</th>
                            <th class="border px-4 py-3">Tanggal</th>
                            <th class="border px-4 py-3">Penyakit</th>
                            <th class="border px-4 py-3">Kemungkinan</th>
                            <th class="border px-4 py-3">Solusi</th>
                            <th class="border px-4 py-3">Gejala</th>
                            <th class="border px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        @php $no = 1; @endphp
                        @forelse ($diagnosis as $item)
                            <tr class="hover:bg-blue-50">
                                <td class="border px-4 py-2">{{ $no++ }}</td>
                                <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal_diagnosa)->format('d-m-Y') }}</td>
                                <td class="border px-4 py-2">{{ $item->disease->nama_penyakit ?? '-' }}</td>
                                <td class="border px-4 py-2">
                                    {{ $item->hasil_diagnosa ?? '-' }}%
                                    ({{ interpretasiKemungkinan($item->hasil_diagnosa) }})
                                </td>
                                <td class="border px-4 py-2">
                                    <ul class="list-disc list-inside text-sm">
                                        @forelse ($item->disease->solutions ?? [] as $solusi)
                                            <li>{{ $solusi->solusi }}</li>
                                        @empty
                                            <li>-</li>
                                        @endforelse
                                    </ul>
                                </td>
                                <td class="border px-4 py-2">
                                    <ul class="list-disc list-inside text-sm">
                                        @foreach ($item->symptom as $symptom)
                                            <li>{{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('riwayat.diagnosa.print', ['id' => $item->id]) }}"
                                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-md transition">
                                        Cetak PDF
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-gray-100 text-center">
                                <td colspan="9" class="border px-4 py-4 text-gray-600">Tidak ada riwayat diagnosa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>
