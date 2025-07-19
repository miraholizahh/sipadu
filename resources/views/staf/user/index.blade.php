<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-custom" style="font-family: 'Roboto Slab', serif;">
            {{ __('Kelola Akun') }}
        </h2>
    </x-slot>

    <style>
        .text-custom {
            font-size: 1rem !important; 
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <div style="text-align: right;">
                        <x-primary-button tag="a" href="{{ route('user.create') }}" class="text-custom">Tambah Data</x-primary-button>
                    </div>
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th class="text-custom">No</th>
                                <th class="text-custom">Nama</th>
                                <th class="text-custom">User ID</th>
                                <th class="text-custom">Email</th>
                                <th class="text-custom">Telepon</th>
                                <th class="text-custom">Kata Sandi</th>
                                <th class="text-custom">Alamat</th>
                                <th class="text-custom">Jenis Kelamin</th>
                                <th class="text-custom">Aksi</th>
                            </tr>
                        </x-slot>

                        @php $num=1; @endphp
                        @foreach($users as $user)
                        @if($user->idRole === 2)
                        <tr>
                            <td class="text-custom">{{ $num++ }}</td>
                            <td class="text-custom">{{ $user->nama }}</td>
                            <td class="text-custom">{{ $user->id }}</td>
                            <td class="text-custom">{{ $user->email }}</td>
                            <td class="text-custom">{{ $user->telepon }}</td>
                            <td class="text-custom">Tersembunyi</td>
                            <td class="text-custom">{{ $user->alamat }}</td>
                            <td class="text-custom">{{ $user->jenis_kelamin }}</td>
                            <td class="text-custom flex gap-2">
                                <x-warning-button tag="a" href="{{ route('user.edit', $user->id) }}" class="text-custom">Edit</x-warning-button>
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="
                                        $dispatch('open-modal', 'confirm-user-deletion');
                                        $dispatch('set-action', '{{ route('user.destroy', $user->id) }}');">
                                    Hapus
                                </x-danger-button>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </x-table>

                    <x-modal name="confirm-user-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @csrf
                            @method('delete')
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Apakah Anda yakin akan menghapus akun ini?
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Setelah dihapus, data akun tidak bisa dikembalikan.
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
