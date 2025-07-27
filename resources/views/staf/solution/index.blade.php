<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray leading-tight">
            {{ __('Kelola Solusi') }}
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

        .aksi-buttons {
            display: flex;
            gap: 0.25rem;
            align-items: center;
        }

        .aksi-buttons svg {
            width: 1rem;
            height: 1rem;
            margin-right: 0.25rem;
            display: inline;
        }

        .aksi-buttons .text-custom {
            display: flex;
            align-items: center;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <div class="text-right mb-4">
                        <x-primary-button tag="a" href="{{ route('solution.create') }}" class="text-custom">Tambah Data</x-primary-button>
                    </div>

                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th class="text-custom">No</th>
                                <th class="text-custom">Solusi</th>
                                <th class="text-custom">Penyakit</th>
                                <th class="text-custom">Aksi</th>
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach($solutions as $solution)
                        <tr>
                            <td class="text-custom">{{ $num++ }}</td>
                            <td class="text-custom">
                                <div class="max-w-xs whitespace-pre-line break-words overflow-wrap">
                                    {{ $solution->solusi }}
                                </div>
                            </td>
                            <td class="text-custom">{{ $solution->disease->nama_penyakit ?? '-' }}</td>
                            <td class="text-custom aksi-buttons">
                                <x-warning-button tag="a" href="{{ route('solution.edit', $solution->id) }}" class="text-custom">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536M9 13l6.768-6.768a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H9v-1.414a2 2 0 01.586-1.414z" />
                                    </svg>
                                    Edit
                                </x-warning-button>

                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="
                                        $dispatch('open-modal', 'confirm-solution-deletion');
                                        $dispatch('set-action', '{{ route('solution.destroy', $solution->id) }}');">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Hapus
                                </x-danger-button>
                            </td>
                        </tr>
                        @endforeach
                    </x-table>

                    <x-modal name="confirm-solution-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @csrf
                            @method('delete')
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Apakah Anda yakin ingin menghapus data ini?
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Tindakan ini tidak dapat dibatalkan.
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
