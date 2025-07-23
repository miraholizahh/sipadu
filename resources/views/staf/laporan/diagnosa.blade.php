<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-custom" style="font-family: 'Roboto Slab', serif;">
            {{ __('Laporan Diagnosa') }}
        </h2>
    </x-slot>

    <style>
        .text-custom {
            font-size: 1rem !important; 
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
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
                                <td>{{ $item->disease->solusi ?? '-' }}</td>
                                <td>
                                    <ul class="list-disc list-inside text-sm">
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
