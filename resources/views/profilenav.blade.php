<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Tentang</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    .indent-paragraph p {
      text-indent: 2em;
      margin: 0;
    }
  </style>
</head>
<body class="bg-white text-black">
  <x-navbar />

  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 my-10">
    
    <!-- Section: Sistem Pakar -->
    <section class="bg-gray-100 rounded-xl shadow-md p-8">
      <h2 class="text-2xl font-bold mb-4">Sistem Pakar Diagnosa DBD</h2>
      <div class="text-base indent-paragraph leading-relaxed text-justify">
        <p>
          Aplikasi berbasis web yang dirancang untuk membantu masyarakat mendeteksi dini penyakit Demam Berdarah Dengue (DBD) berdasarkan gejala yang dirasakan. Aplikasi ini menggunakan metode Dempster-Shafer untuk menganalisis gejala dan memberikan hasil diagnosa awal dengan tingkat keyakinan tertentu, sehingga pengguna dapat mengetahui kemungkinan terkena DBD tanpa harus berkonsultasi langsung dengan dokter.
        </p>
        <p>Sistem ini dibangun dengan basis pengetahuan yang berasal dari pakar medis, terutama dalam hal pengenalan gejala DBD. Informasi tersebut diolah secara sistematis dan dikembangkan menjadi aturan atau logika tertentu yang bisa diproses oleh sistem.
        <h1>Manfaat sistem pakar dalam deteksi DBD:</h1> 
           <li>Membantu masyarakat umum dalam mengenali tanda-tanda awal DBD dengan cepat dan mandiri.</li> 
           <li>Meningkatkan kesadaran dini, sehingga kemungkinan keterlambatan penanganan bisa ditekan.</li> 
           <li>Bersifat fleksibel dan dapat diakses kapan saja, selama terkoneksi dengan internet.</li> 
        </p>
      </div>
    </section>

    <!-- Section: Metode Dempster-Shafer -->
    <section class="bg-gray-100 rounded-xl shadow-md p-8">
      <h2 class="text-2xl font-bold mb-4">Metode Dempster-Shafer</h2>
      <div class="text-base indent-paragraph leading-relaxed text-justify">
        <p>
          Metode Dempster-Shafer dalam aplikasi ini digunakan untuk mengolah dan menggabungkan informasi dari berbagai gejala yang dimasukkan oleh pengguna. Setiap gejala memiliki tingkat keyakinan (belief) terhadap kemungkinan penyakit DBD. Metode ini membantu sistem dalam menangani ketidakpastian dan ambiguitas data, yang sering muncul karena gejala DBD bisa mirip dengan penyakit lain seperti tipes, malaria, atau flu.
        </p>
      </div>
    </section>

    <!-- Section: Fitur -->
    <section class="bg-gray-100 rounded-xl shadow-md p-8">
      <h2 class="text-2xl font-bold mb-4">Fitur Utama Aplikasi</h2>
      <ol class="list-decimal pl-6 space-y-2 text-base leading-relaxed">
        <li>Deteksi dini gejala DBD.</li>
        <li>Analisis berbasis metode Dempster-Shafer.</li>
        <li>Riwayat diagnosa pengguna.</li>
        <li>Antarmuka yang mudah digunakan.</li>
        <li>Solusi tindakan awal (bukan pengganti dokter).</li>
      </ol>
    </section>

    <!-- Section: Cara Menggunakan Aplikasi -->
    <section class="bg-gray-100 rounded-xl shadow-md p-8">
      <h2 class="text-2xl font-bold mb-4">Cara Menggunakan Aplikasi</h2>
      <ol class="list-decimal pl-6 space-y-2 text-base leading-relaxed">
        <li>Masuk atau daftar akun pengguna.</li>
        <li>Pilih Menu "Diagnosa".</li>
        <li>Pilih gejala yang anda rasakan, lalu tekan tombol "Simpan Gejala".</li>
        <li>Hasil diagnosa akan terlihat langsung ketika anda menekan tombol "Simpan Gejala".</li>
        <li>Jika anda ingin melihat riwayat diagnosa yang telah dilakukan sebelumnya, tekan menu "Riwayat Diagnosa".</li>
        <li>Jika anda ingin memperlihatkan hasil diagnosa di sistem kepada dokter atau tim medis maka anda dapat mencetak riwayat diagnosa dengan menakan tombol "Cetak PDF".</li>
      </ol>
    </section>

  </main>
</body>
</html>
