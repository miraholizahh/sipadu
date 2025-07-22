<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa DBD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-navbar></x-navbar>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">

                    <div class="text-left text-2xl font-semibold mb-4">
                        {{ __("Diagnosa DBD") }}
                    </div>

                    @if (session('result'))
                        <div class="mb-6 p-4 bg-green-500 text-white rounded">
                            <p><strong>Nama:</strong> {{ session('result')['nama'] }}</p>
                            <p><strong>Jenis Kelamin:</strong> {{ session('result')['jenis_kelamin'] }}</p>
                            <p><strong>Tanggal Diagnosa:</strong> {{ \Carbon\Carbon::parse($diagnosis->tanggal_diagnosa)->format('d-m-Y H:i') }}</p>
                            <p><strong>Hasil Diagnosa:</strong> {{ session('result')['penyakit'] }}</p>
                            <p><strong>Solusi:</strong> {{ session('result')['solusi'] }}</p>

                            <form method="GET" action="{{ route('diagnosis.create') }}" class="mt-4">
                                <x-primary-button type="submit">Berikutnya / Selesai</x-primary-button>
                            </form>
                        </div>
                    @else
                        <form method="POST" action="{{ route('diagnosis.store') }}" class="space-y-6">
                            @csrf

                            <p class="mb-4">Silakan checklist gejala yang Anda rasakan:</p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach($symptoms as $symptom)
                                    <div class="flex items-start gap-2">
                                        <input type="checkbox" name="symptoms[]" value="{{ $symptom->id }}"
                                               id="symptom-{{ $symptom->id }}" class="mt-1">
                                        <label for="symptom-{{ $symptom->id }}">
                                            {{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <x-input-error :messages="$errors->get('symptoms')" class="mt-2" />

                            <div>
                                <x-primary-button type="submit">Simpan Gejala</x-primary-button>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</body>
</html>
