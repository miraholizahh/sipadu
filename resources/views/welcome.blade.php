<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIPADU-DBD - Diagnosa Demam Berdarah</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Gunakan font Poppins --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-900 text-white antialiased">

  {{-- Navbar --}}
  <x-navbar />

  {{-- Hero Section --}}
  <div class="relative h-screen overflow-hidden flex items-center justify-center text-center">
    <img src="{{ asset('images/background-dbd.png') }}" alt="Background"
         class="absolute inset-0 w-full h-full object-cover brightness-50">

    <div class="relative z-10 px-4 max-w-2xl">
      <p class="text-2xl text-gray-200 mb-4">
        Kenali DBD, Tangani Sejak Dini.
      </p>
      <p class="text-xl text-gray-300 mb-6">
        Percayakan diagnosamu pada SIPADU-DBD.
      </p>


      {{-- Jika belum login, bisa tampilkan tombol login (opsional) --}}
      @if (Route::has('login'))
    @auth
        <a href="{{ route('diagnosis.form') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-full font-semibold shadow-lg transition">
            Mulai Diagnosa
        </a>
    @else
        <a href="{{ route('login') }}"
           class="mt-4 inline-block text-sm text-gray-300 hover:underline">
            Silakan login untuk memulai diagnosa.
        </a>
    @endauth
@endif


    </div>
  </div>

  {{-- Footer --}}
  <footer class="bg-yellow-800 text-center py-6 text-sm text-gray-300">
    &copy; {{ date('Y') }} SIPADU-DBD. Diagnosa cerdas untuk hidup lebih sehat.
  </footer>

</body>
</html>
