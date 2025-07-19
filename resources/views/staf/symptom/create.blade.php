<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-gray leading-tight">
            {{ __('Kelola Gejala') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray text-gray">
                    <form method="post" action="{{ route('symptom.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl text-gray">
                            <x-input-label for="kode_gejala" value="Kode Gejala" />
                            <x-text-input id="kode_gejala" type="text" name="kode_gejala" class="mt-1 block w-full" value="{{ old('kode_gejala') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_gejala')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="nama_gejala" value="Nama Gejala" />
                            <x-text-input id="nama_gejala" type="text" name="nama_gejala" class="mt-1 block w-full" value="{{ old('nama_gejala') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_gejala')" />
                        </div>
                        <x-secondary-button tag="a" href="{{ route('symptom.index') }}">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>