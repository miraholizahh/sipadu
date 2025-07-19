<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Diagnosa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-navbar></x-navbar>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800">

                    <div class="text-left text-2xl font-semibold mb-4">
                        {{ __("Riwayat Diagnosa") }}
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-300 text-sm text-left">
                            <thead class="bg-gray-700 text-white">
                                <tr>
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">Jenis Kelamin</th>
                                    <th class="border px-4 py-2">Tanggal</th>
                                    <th class="border px-4 py-2">Penyakit</th>
                                    <th class="border px-4 py-2">Solusi</th>
                                    <th class="border px-4 py-2">Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($diagnoses as $item)
                                    <tr class="bg-gray-50 hover:bg-gray-100">
                                        <td class="border px-4 py-2">{{ $no++ }}</td>
                                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal_diagnosa)->format('d-m-Y') }}</td>
                                        <td class="border px-4 py-2">{{ $item->disease->nama_penyakit ?? '-' }}</td>
                                        <td class="border px-4 py-2">{{ $item->disease->solusi ?? '-' }}</td>
                                        <td class="border px-4 py-2">
                                            <ul class="list-disc list-inside text-sm">
                                                @foreach ($item->symptoms as $symptom)
                                                    <li>{{ $symptom->nama_gejala }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center border px-4 py-2 text-red-600">
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
