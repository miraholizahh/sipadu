<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-gray leading-tight">
            {{ __('Kelola Penyakit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray text-gray">
                    <form method="post" action="{{ route('disease.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl text-gray">
                            <x-input-label for="kode_penyakit" value="Kode Penyakit" />
                            <x-text-input id="kode_penyakit" type="text" name="kode_penyakit" class="mt-1 block w-full" value="{{ old('kode_penyakit') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_penyakit')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="nama_penyakit" value="Nama Penyakit" />
                            <x-text-input id="nama_penyakit" type="text" name="nama_penyakit" class="mt-1 block w-full" value="{{ old('nama_penyakit') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_penyakit')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="solusi" value="Solusi" />
                            <x-text-input id="solusi" type="text" name="solusi" class="mt-1 block w-full" value="{{ old('solusi') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('solusi')" />
                        </div>
                        <x-secondary-button tag="a" href="{{ route('disease.index') }}">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>