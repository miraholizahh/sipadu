<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Gejala') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray">
                    <form method="post" action="{{ route('symptom.update', $symptom->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="max-w-xl">
                            <x-input-label for="kode_gejala" value="Kode Gejala" class="text-gray"/>
                            <x-text-input id="kode_gejala" type="text" name="kode_gejala" class="mt-1 block w-full text-black" value="{{ old('kode_gejala', $symptom->kode_gejala) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_gejala')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="nama_gejala" value="Nama Gejala" class="text-gray"/>
                            <x-text-input id="nama_gejala" type="text" name="nama_gejala" class="mt-1 block w-full text-black" value="{{ old('nama_gejala', $symptom->nama_gejala) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_gejala')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-secondary-button tag="a" href="{{ route('symptom.index') }}">Batal</x-secondary-button>
                            <x-primary-button name="save" value="true">Perbarui</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>