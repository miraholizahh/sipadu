<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Kontak</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-poppins bg-white text-gray-900">
  <x-navbar />

  <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-8">
    <section class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
      <div class="py-10 px-8 sm:px-10 text-black">
        <h1 class="text-2xl font-extrabold mb-6">Hubungi Kami</h1>
        <div class="space-y-6 text-base leading-relaxed">
          <div>
            <h2 class="font-semibold text-lg">Alamat</h2>
            <p>Jl. Surya Kencana, Sawah Gede, Kec. Cianjur,<br />Kabupaten Cianjur, Jawa Barat 43212</p>
          </div>

          <div>
            <h2 class="font-semibold text-lg">Telepon</h2>
            <p>0812-9011-7250</p>
          </div>

          <div>
            <h2 class="font-semibold text-lg">Email</h2>
            <p>pkmcianjurkota.registrasi@gmail.com</p>
          </div>

          <div>
            <h2 class="font-semibold text-lg">Instagram</h2>
            <p>@puskesmas_cianjurkota</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <x-footer />
</body>
</html>
