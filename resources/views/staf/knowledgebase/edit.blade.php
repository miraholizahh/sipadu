<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray leading-tight">
            {{ __('Kelola Basis Pengetahuan') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex items-center justify-center py-12">
        <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('knowledge_base.update', $knowledge_base->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="max-w-xl">
                    <x-input-label for="idSymptom" value="Gejala" class="text-gray" />
                    <select id="idSymptom" name="idSymptom" class="mt-1 block w-full rounded text-black border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">-- Pilih Gejala --</option>
                        @foreach ($symptoms as $symptom)
                            <option value="{{ $symptom->id }}" {{ $symptom->id == $knowledge_base->idSymptom ? 'selected' : '' }}>
                                {{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('idSymptom')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="idDisease" value="Penyakit" class="text-gray" />
                    <select id="idDisease" name="idDisease" class="mt-1 block w-full rounded text-black border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">-- Pilih Penyakit --</option>
                        @foreach ($diseases as $disease)
                            <option value="{{ $disease->id }}" {{ $disease->id == $knowledge_base->idDisease ? 'selected' : '' }}>
                                {{ $disease->kode_penyakit }} - {{ $disease->nama_penyakit }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('idDisease')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="bobot" value="Bobot" class="text-gray" />
                    <x-text-input id="bobot" type="text" name="bobot" class="mt-1 block w-full text-black" value="{{ old('bobot', $knowledge_base->bobot) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('bobot')" />
                </div>

                <div class="flex items-center gap-4 mt-4">
                    <x-secondary-button tag="a" href="{{ route('knowledge_base.index') }}">Batal</x-secondary-button>
                    <x-primary-button name="update" value="true">Perbarui</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
