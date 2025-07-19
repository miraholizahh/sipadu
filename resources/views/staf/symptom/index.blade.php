<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Kelola Gejala') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <div class="text-right mb-4">
                        <x-primary-button tag="a" href="{{ route('symptom.create') }}">Tambah Data</x-primary-button>
                    </div>

                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th>Nama Gejala</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach($symptoms as $symptom)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $symptom->kode_gejala }}</td>
                                <td>{{ $symptom->nama_gejala }}</td>
                                <td>
                                    <x-primary-button tag="a" href="{{ route('symptom.edit', $symptom->id) }}">Edit</x-primary-button>
                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-symptom-deletion');
                                            $dispatch('set-action', '{{ route('symptom.destroy', $symptom->id) }}');">
                                        Hapus
                                    </x-danger-button>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>

                    <x-modal name="confirm-symptom-deletion" focusable maxWidth="xl">
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