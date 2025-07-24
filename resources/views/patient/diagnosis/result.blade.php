<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <x-navbar></x-navbar>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-10 pl-10 text-left text-black">
                <div class="text-left text-2xl font-semibold mb-6">
                    {{ __("Hasil Diagnosa DBD") }}
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

                @if ($diagnosis)
                    <div class="mb-6 p-6 bg-green-500 text-white rounded-md w-[90%] max-w-3xl">
                        <p><strong>Nama:</strong> {{ $diagnosis->user->nama ?? '-' }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $diagnosis->user->jenis_kelamin ?? '-' }}</p>
                        <p><strong>Tanggal Diagnosa:</strong> {{ \Carbon\Carbon::parse($diagnosis->tanggal_diagnosa)->format('d-m-Y H:i') }}</p>
                        <p><strong>Penyakit:</strong> {{ $diagnosis->disease->nama_penyakit ?? 'Tidak diketahui' }}</p>
                        <p><strong>Hasil Kemungkinan:</strong> {{ $diagnosis->hasil_diagnosa ?? '-' }}% ({{ interpretasiKemungkinan($diagnosis->hasil_diagnosa) }})</p>
                        <p><strong>Nilai Belief:</strong> {{ $diagnosis->dempsterShafer->belief ?? '-' }}</p>
                        <p><strong>Nilai Plausibility:</strong> {{ $diagnosis->dempsterShafer->plausibility ?? '-' }}</p>
                        <p><strong>Solusi:</strong> {{ $diagnosis->disease->solusi ?? '-' }}</p>

                        <div class="mt-4">
                            <h3 class="text-md font-semibold mb-1">Gejala yang Dipilih:</h3>
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($diagnosis->symptom as $symptom)
                                    <li>{{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <form method="GET" action="{{ route('diagnosis.form') }}" class="mt-4">
                            <x-primary-button type="submit">Selesai</x-primary-button>
                        </form>
                    </div>
                @else
                    <p class="text-black">Hasil diagnosa tidak tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
