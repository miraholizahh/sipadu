<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray leading-tight">
            {{ __('Laporan Diagnosa') }}
        </h2>
    </x-slot>

    <style>
        .text-custom {
            font-size: 1rem !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        th, td {
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            text-align: left;
            vertical-align: top;
        }

        thead {
            background-color: #f9fafb;
            color: #374151;
            font-weight: 600;
        }

        tbody tr:hover {
            background-color: #f3f4f6;
        }

        ul {
            padding-left: 1rem;
            list-style-type: disc;
        }

        .solusi-wrap {
            max-width: 250px; /* batas maksimal lebar kolom */
            white-space: pre-line;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">

                    <form method="GET" action="{{ route('laporan.diagnosa') }}" class="mb-6 flex flex-wrap gap-4 items-end">
                        <div>
                            <label for="from" class="block text-sm font-medium text-gray-700">Dari Tanggal</label>
                            <input type="date" name="from" id="from" value="{{ request('from') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                        </div>
                        <div>
                            <label for="to" class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
                            <input type="date" name="to" id="to" value="{{ request('to') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                        </div>
                        <div class="flex gap-2 mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Cari
                            </button>
                            <a href="{{ route('laporan.diagnosa.print', ['from' => request('from'), 'to' => request('to')]) }}"
                               class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                Print PDF
                            </a>
                        </div>
                    </form>

                    @php
                        function interpretasiKemungkinan($percent) {
                            if ($percent == 100) return "Sangat Yakin";
                            elseif ($percent >= 80) return "Kemungkinan Besar";
                            elseif ($percent >= 51) return "Kemungkinan";
                            elseif ($percent >= 0) return "Sedikit Kemungkinan";
                            else return "Tidak Diketahui";
                        }
                    @endphp

                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal</th>
                                <th>Penyakit</th>
                                <th>Kemungkinan</th>
                                <th>Solusi</th>
                                <th>Gejala</th>
                            </tr>
                        </x-slot>

                        @php $no = 1; @endphp
                        @forelse ($diagnosis as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->user->nama ?? '-' }}</td>
                                <td>{{ $item->user->jenis_kelamin ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_diagnosa)->format('d-m-Y') }}</td>
                                <td>{{ $item->disease->nama_penyakit ?? '-' }}</td>
                                <td>
                                    {{ $item->hasil_diagnosa ?? '-' }}%
                                    ({{ interpretasiKemungkinan($item->hasil_diagnosa) }})
                                </td>
                                <td>
                                    <div class="solusi-wrap">
                                        <ul>
                                            @forelse ($item->disease->solutions ?? [] as $solusi)
                                                <li>{{ $solusi->solusi }}</li>
                                            @empty
                                                <li>-</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($item->symptom as $symptom)
                                            <li>{{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="8">Tidak ada riwayat diagnosa.</td>
                            </tr>
                        @endforelse
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
