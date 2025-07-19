<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Penyakit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray">
                    <form method="post" action="{{ route('disease.update', $gedung->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="max-w-xl text-gray">
                            <x-input-label for="kode_penyakit" value="Kode Penyakit" class="text-gray"/>
                            <x-text-input id="kode_penyakit" type="text" name="kode_penyakit" class="mt-1 block w-full text-black" value="{{ old('kode_penyakit', $disease->kode_penyakit) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_penyakit')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="nama_penyakit" value="Nama Penyakit" class="text-gray"/>
                            <x-text-input id="nama_penyakit" type="text" name="nama_penyakit" class="mt-1 block w-full text-black" value="{{ old('nama_penyakit', $disease->nama_penyakit) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_penyakit')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="keterangan" value="Keterangan" class="text-gray"/>
                            <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full text-black" value="{{ old('keterangan', $disease->keterangan) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="solusi" value="Solusi" class="text-gray"/>
                            <x-text-input id="solusi" type="text" name="solusi" class="mt-1 block w-full text-black" value="{{ old('solusi', $disease->solusi) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('solusi')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-secondary-button tag="a" href="{{ route('disease.index') }}">Batal</x-secondary-button>
                            <x-primary-button name="save" value="true">Perbarui</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>