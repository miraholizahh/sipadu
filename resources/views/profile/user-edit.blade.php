<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-poppins">
    <x-navbar />

    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 mb-16">
        <section class="bg-white shadow-xl rounded-xl p-6 sm:p-8 mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Informasi Profil</h1>
            <div class="max-w-2xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </section>

        <section class="bg-white shadow-xl rounded-xl p-6 sm:p-8 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Ubah Kata Sandi</h2>
            <div class="max-w-2xl">
                @include('profile.partials.update-password-form')
            </div>
        </section>

        <section class="bg-white shadow-xl rounded-xl p-6 sm:p-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Hapus Akun</h2>
            <div class="max-w-2xl">
                @include('profile.partials.delete-user-form')
            </div>
        </section>
    </main>
</body>
</html>
