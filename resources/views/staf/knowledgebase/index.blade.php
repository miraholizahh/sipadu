<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-custom" style="font-family: 'Roboto Slab', serif;">
            {{ __('Kelola Basis Pengetahuan') }}
        </h2>
    </x-slot>

    <style>
        .text-custom {
            font-size: 1rem !important; 
        }
    </style>

    <div class="py-12" x-data="{ action: '' }" x-on:set-action.window="action = $event.detail">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <div class="text-right mb-4">
                        <x-primary-button tag="a" href="{{ route('knowledge_base.create') }}">Tambah Data</x-primary-button>
                    </div>

                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th>Nama Gejala</th>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach($knowledge_bases as $item)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $item->symptom->kode_gejala ?? '-' }}</td>
                                <td>{{ $item->symptom->nama_gejala ?? '-' }}</td>
                                <td>{{ $item->disease->kode_penyakit ?? '-' }}</td>
                                <td>{{ $item->disease->nama_penyakit ?? '-' }}</td>
                                <td>{{ $item->bobot }}</td>
                                <td class="flex gap-2">
                                    <x-primary-button tag="a" href="{{ route('knowledge_base.edit', $item->id) }}">
                                        Edit
                                    </x-primary-button>
                                    <x-danger-button
                                        x-on:click.prevent="
                                            $dispatch('open-modal', 'confirm-kb-deletion');
                                            $dispatch('set-action', '{{ route('knowledge_base.destroy', $item->id) }}')">
                                        Hapus
                                    </x-danger-button>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>

                    <x-modal name="confirm-kb-deletion" focusable maxWidth="xl">
                        <form method="POST" x-bind:action="action" class="p-6">
                            @csrf
                            @method('DELETE')
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Apakah Anda yakin ingin menghapus data ini?
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Data yang dihapus tidak dapat dikembalikan.
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
