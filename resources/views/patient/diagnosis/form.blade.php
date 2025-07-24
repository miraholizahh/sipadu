<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa DBD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <x-navbar></x-navbar>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-10 pl-10 text-left text-black">
                <div class="text-left text-2xl font-semibold mb-6">
                    {{ __("Diagnosa DBD") }}
                </div>

                @if (session('result'))
                    <div class="mb-6 p-6 bg-green-500 text-white rounded-md w-[90%] max-w-3xl">
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
                    <form method="POST" action="{{ route('diagnosis.store') }}">
                        @csrf

                        <p class="mb-4 text-black font-medium">Silakan checklist gejala yang Anda rasakan:</p>

                        <div class="overflow-x-auto rounded-md bg-white shadow-md w-[90%] max-w-3xl">
                            <table class="min-w-full text-black border border-gray-300">
                                <thead class="bg-gray-100 text-sm text-gray-700">
                                    <tr>
                                        <th class="px-4 py-3 border text-left">No</th>
                                        <th class="px-4 py-3 border text-left">Gejala Penyakit</th>
                                        <th class="px-4 py-3 border text-center">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($symptoms as $index => $symptom)
                                        <tr class="hover:bg-gray-50 text-sm">
                                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                            <td class="px-4 py-2 border">{{ $symptom->nama_gejala }}</td>
                                            <td class="px-4 py-2 border text-center">
                                                <input type="checkbox" name="symptoms[]" value="{{ $symptom->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <x-input-error :messages="$errors->get('symptoms')" class="mt-2 text-red-500" />

                        <div class="mt-6">
                            <x-primary-button type="submit">Simpan Gejala</x-primary-button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
