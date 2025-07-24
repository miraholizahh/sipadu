<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Diagnosa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-navbar />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-10 pl-10 text-left text-black">
                <div class="text-left text-2xl font-semibold mb-6">
                    {{ __("Riwayat Diagnosa DBD") }}
                </div>

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
                                    <th class="border px-4 py-2">Aksi</th>
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
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('riwayat.diagnosa.print', ['id' => $item->id]) }}"
                                               class="bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-1 rounded">
                                                Print PDF
                                            </a>
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
