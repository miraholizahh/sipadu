<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-navbar></x-navbar>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">

                    <div class="text-left text-2xl font-semibold mb-6">
                        {{ __("Hasil Diagnosa DBD") }}
                    </div>

                    @if ($diagnosis)
                        <div class="mb-6 space-y-2">
                            <p><strong>Nama</strong>{{ $diagnosis->user->nama ?? '-' }}</p>
                            <p><strong>Jenis Kelamin</strong>{{ $diagnosis->user->jenis_kelamin ?? '-' }}</p>
                            <p><strong>Tanggal Diagnosa:</strong> {{ \Carbon\Carbon::parse($diagnosis->tanggal_diagnosa)->format('d-m-Y H:i') }}</p>
                            <p><strong>Penyakit:</strong> {{ $diagnosis->disease->nama_penyakit ?? 'Tidak diketahui' }}</p>
                            <p><strong>Hasil Kemungkinan:</strong> {{ $diagnosis->hasil }}%</p>
                            <p><strong>Solusi:</strong> {{ $diagnosis->disease->solusi ?? '-' }}</p>
                        </div>

                        <div class="mt-6">
                            <h3 class="text-lg font-medium mb-2">Gejala yang Dipilih:</h3>
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($diagnosis->symptoms as $symptom)
                                    <li>{{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-6 flex gap-2">
                            <a href="{{ route('diagnosis.create') }}">
                                <x-primary-button>Diagnosa Lagi</x-primary-button>
                            </a>
                            <a href="{{ route('diagnosis.riwayat') }}">
                                <x-secondary-button>Lihat Riwayat</x-secondary-button>
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
