<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-custom" style="font-family: 'Roboto Slab', serif;">
            {{ __('Kelola Penyakit') }}
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
                    <div class="text-right mb-4">
                        <x-primary-button tag="a" href="{{ route('disease.create') }}">Tambah Data</x-primary-button>
                    </div>

                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>No</th>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th>Keterangan</th>
                                <th>Solusi</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach($diseases as $disease)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $disease->kode_penyakit }}</td>
                                <td>{{ $disease->nama_penyakit }}</td>
                                <td>{{ $disease->keterangan }}</td>
                                <td>{{ $disease->solusi }}</td>
                                <td>
                                    <x-primary-button tag="a" href="{{ route('disease.edit', $disease->id) }}">Edit</x-primary-button>
                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-disease-deletion');
                                            $dispatch('set-action', '{{ route('disease.destroy', $disease->id) }}');">
                                        Hapus
                                    </x-danger-button>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>

                    <x-modal name="confirm-disease-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @csrf
                            @method('delete')
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Apakah Anda yakin akan menghapus data?
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Setelah proses dilaksanakan, data akan dihilangkan secara permanen.
                            </p>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">Tidak</x-secondary-button>
                                <x-danger-button class="ml-3">Ya</x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>