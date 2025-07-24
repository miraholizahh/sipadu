<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray leading-tight">
            {{ __('Kelola Akun') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex items-center justify-center py-12">
        <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="max-w-xl">
                    <x-input-label for="nama" value="Nama" class="text-gray" />
                    <x-text-input id="nama" type="text" name="nama" class="mt-1 block w-full text-black" value="{{ old('nama', $user->nama) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="email" value="Email" class="text-gray" />
                    <x-text-input id="email" type="email" name="email" class="mt-1 block w-full text-black" value="{{ old('email', $user->email) }}" autocomplete="off" required />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="telepon" value="Telepon" class="text-gray" />
                    <x-text-input id="telepon" type="text" name="telepon" class="mt-1 block w-full text-black" value="{{ old('telepon', $user->telepon) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('telepon')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="password" value="Kata Sandi" class="text-gray" />
                    <x-text-input id="password" type="password" name="password" class="mt-1 block w-full text-black" placeholder="Biarkan kosong jika tidak ingin mengganti" />
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                </div>
                <div class="max-w-xl">
                    <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" class="text-gray" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" class="mt-1 block w-full text-black" placeholder="Ulangi kata sandi jika mengubah" />
                    <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                </div>

                <div class="max-w-xl">
                    <x-input-label for="alamat" value="Alamat" class="text-gray" />
                    <x-text-input id="alamat" type="text" name="alamat" class="mt-1 block w-full text-black" value="{{ old('alamat', $user->alamat) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                </div>

                <div class="max-w-xl mt-4">
                    <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
                    <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-secondary-button tag="a" href="{{ route('user.index') }}">Batal</x-secondary-button>
                    <x-primary-button name="update" value="true">Simpan Perubahan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
