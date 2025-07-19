<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-gray leading-tight">
            {{ __('Kelola Basis Pengetahuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-custom-color bg-custom-color overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray text-gray">
                    <form method="POST" action="{{ route('knowledge_base.update', $knowledge_base->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="max-w-xl text-gray">
                            <x-input-label for="idSymptom" value="Gejala" />
                            <select id="idSymptom" name="idSymptom" class="mt-1 block w-full rounded text-black">
                                <option value="">-- Pilih Gejala --</option>
                                @foreach ($symptoms as $symptom)
                                    <option value="{{ $symptom->id }}" {{ $symptom->id == $knowledge_base->idSymptom ? 'selected' : '' }}>
                                        {{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('idSymptom')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="idDisease" value="Penyakit" />
                            <select id="idDisease" name="idDisease" class="mt-1 block w-full rounded text-black">
                                <option value="">-- Pilih Penyakit --</option>
                                @foreach ($diseases as $disease)
                                    <option value="{{ $disease->id }}" {{ $disease->id == $knowledge_base->idDisease ? 'selected' : '' }}>
                                        {{ $disease->kode_penyakit }} - {{ $disease->nama_penyakit }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('idDisease')" />
                        </div>
                        <div class="max-w-xl text-gray">
                            <x-input-label for="bobot" value="Bobot" />
                            <x-text-input id="bobot" type="text" name="bobot" class="mt-1 block w-full" value="{{ old('bobot', $knowledge_base->bobot) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('bobot')" />
                        </div>
                        <x-secondary-button tag="a" href="{{ route('knowledge_base.index') }}">Batal</x-secondary-button>
                        <x-primary-button name="update" value="true">Perbarui</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
