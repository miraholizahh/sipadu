<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-navbar />

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
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
                        {{ __("Hasil Diagnosa DBD") }}
                    </div>

                    @if ($diagnosis)
                        <div class="mb-6 space-y-2">
                            <p><strong>Nama:</strong> {{ $diagnosis->user->nama ?? '-' }}</p>
                            <p><strong>Jenis Kelamin:</strong> {{ $diagnosis->user->jenis_kelamin ?? '-' }}</p>
                            <p><strong>Tanggal Diagnosa:</strong> {{ \Carbon\Carbon::parse($diagnosis->tanggal_diagnosa)->format('d-m-Y') }}</p>
                            <p><strong>Penyakit:</strong> {{ $diagnosis->disease->nama_penyakit ?? 'Tidak diketahui' }}</p>
                            <p><strong>Hasil Kemungkinan:</strong> {{ $diagnosis->hasil_diagnosa ?? '-' }}% ({{ interpretasiKemungkinan($diagnosis->hasil_diagnosa) }})</p>
                            {{-- Tambahan Nilai Belief dan Plausibility --}}
                            <p><strong>Nilai Belief:</strong> {{ $diagnosis->dempsterShafer->belief ?? '-' }}</p>
                            <p><strong>Nilai Plausibility:</strong> {{ $diagnosis->dempsterShafer->plausibility ?? '-' }}</p>
                            <p><strong>Solusi:</strong> {{ $diagnosis->disease->solusi ?? '-' }}</p>
                        </div>

                        <div class="mt-6">
                            <h3 class="text-lg font-medium mb-2">Gejala yang Dipilih:</h3>
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($diagnosis->symptom as $symptom)
                                    <li>{{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('diagnosis.form') }}">
                                <x-primary-button>Selesai</x-primary-button>
                            </a>
                        </div>
                    @else
                        <p class="text-white">Hasil diagnosa tidak tersedia.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</body>
</html>
