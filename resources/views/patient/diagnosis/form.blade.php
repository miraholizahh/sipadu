<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa DBD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen font-poppins">
    <x-navbar />

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-8 mb-10">
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl px-8 py-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Diagnosa DBD</h1>

            @if (session('result'))
                <div class="mb-6 p-6 bg-green-100 border border-green-300 text-green-900 rounded-md">
                    <h2 class="text-xl font-semibold mb-4">Hasil Diagnosa</h2>
                    <ul class="space-y-1">
                        <li><strong>Nama:</strong> {{ session('result')['nama'] }}</li>
                        <li><strong>Jenis Kelamin:</strong> {{ session('result')['jenis_kelamin'] }}</li>
                        <li><strong>Tanggal Diagnosa:</strong> {{ \Carbon\Carbon::parse($diagnosis->tanggal_diagnosa)->format('d-m-Y H:i') }}</li>
                        <li><strong>Hasil Diagnosa:</strong> {{ session('result')['penyakit'] }}</li>
                        <li><strong>Solusi:</strong> {{ session('result')['solusi'] }}</li>
                    </ul>

                    <form method="GET" action="{{ route('diagnosis.create') }}" class="mt-6">
                        <x-primary-button>Berikutnya / Selesai</x-primary-button>
                    </form>
                </div>
            @else
                <form method="POST" action="{{ route('diagnosis.store') }}">
                    @csrf

                    <p class="mb-4 text-gray-700 font-medium text-base">
                        Silakan centang gejala yang Anda alami:
                    </p>

                    <div class="overflow-x-auto bg-gray-50 rounded-md shadow-inner w-full">
                        <table class="min-w-full border border-gray-300 text-sm">
                            <thead class="bg-gray-200 text-gray-800 font-semibold">
                                <tr>
                                    <th class="px-4 py-3 border text-left w-12">No</th>
                                    <th class="px-4 py-3 border text-left">Gejala Penyakit</th>
                                    <th class="px-4 py-3 border text-center w-24">Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($symptoms as $index => $symptom)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 border">{{ $symptom->nama_gejala }}</td>
                                        <td class="px-4 py-2 border text-center">
                                            <input type="checkbox" name="symptoms[]" value="{{ $symptom->id }}" class="accent-red-600 scale-110">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-input-error :messages="$errors->get('symptoms')" class="mt-3 text-red-500" />

                    <div class="mt-6">
                        <x-primary-button>Simpan Gejala</x-primary-button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</body>
</html>
