<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray leading-tight">
            {{ __('Kelola Penyakit') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex items-center justify-center py-12">
        <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="{{ route('disease.update', $disease->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="max-w-xl">
                    <x-input-label for="kode_penyakit" value="Kode Penyakit" />
                    <x-text-input id="kode_penyakit" type="text" name="kode_penyakit" class="mt-1 block w-full text-black" value="{{ old('kode_penyakit', $disease->kode_penyakit) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('kode_penyakit')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="nama_penyakit" value="Nama Penyakit" />
                    <x-text-input id="nama_penyakit" type="text" name="nama_penyakit" class="mt-1 block w-full text-black" value="{{ old('nama_penyakit', $disease->nama_penyakit) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_penyakit')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="keterangan" value="Keterangan" />
                    <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full text-black" value="{{ old('keterangan', $disease->keterangan) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                </div>

                <div class="flex items-center gap-4 mt-4">
                    <x-secondary-button tag="a" href="{{ route('disease.index') }}">Batal</x-secondary-button>
                    <x-primary-button name="save" value="true">Simpan Perubahan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
