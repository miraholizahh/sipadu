<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray leading-tight">
            {{ __('Kelola Gejala') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex items-center justify-center py-12">
        <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="{{ route('symptom.update', $symptom->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="max-w-xl">
                    <x-input-label for="kode_gejala" value="Kode Gejala" class="text-gray" />
                    <x-text-input id="kode_gejala" type="text" name="kode_gejala" class="mt-1 block w-full text-black" value="{{ old('kode_gejala', $symptom->kode_gejala) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('kode_gejala')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="nama_gejala" value="Nama Gejala" class="text-gray" />
                    <x-text-input id="nama_gejala" type="text" name="nama_gejala" class="mt-1 block w-full text-black" value="{{ old('nama_gejala', $symptom->nama_gejala) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_gejala')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-secondary-button tag="a" href="{{ route('symptom.index') }}">Batal</x-secondary-button>
                    <x-primary-button name="save" value="true">Simpan Perubahan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
