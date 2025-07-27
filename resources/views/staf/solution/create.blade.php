<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray leading-tight">
            {{ __('Kelola Solusi') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex items-center justify-center py-12">
        <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="{{ route('solution.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="max-w-xl">
                    <x-input-label for="solusi" value="Solusi" class="text-gray" />
                    <x-text-input id="solusi" type="text" name="solusi" class="mt-1 block w-full text-black" value="{{ old('solusi') }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('solusi')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="idDisease" value="Penyakit" class="text-gray" />
                    <select id="idDisease" name="idDisease" class="mt-1 block w-full rounded text-black border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">-- Pilih Penyakit --</option>
                        @foreach ($diseases as $disease)
                            <option value="{{ $disease->id }}" {{ old('idDisease') == $disease->id ? 'selected' : '' }}>
                                {{ $disease->nama_penyakit }} - {{ $disease->nama_penyakit }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('idSolution')" />
                </div>

                <div class="flex items-center gap-4 mt-4">
                    <x-secondary-button tag="a" href="{{ route('solution.index') }}">Batal</x-secondary-button>
                    <x-primary-button name="save" value="true">Simpan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
