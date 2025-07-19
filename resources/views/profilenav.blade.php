<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .indent-paragraph p {
            text-indent: 2em;
            margin: 0;
        }
    </style>

    <style>
        .list-decimal {
            list-style-type: decimal;
        }
        .list-decimal li {
            margin-bottom: 0.5em; 
        }
    </style>
</head>
<body>
    <x-navbar></x-navbar>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-lightblue bg-yellow-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-10 pl-10 text-left text-black">
                <div class="text-left text-2xl font-semibold mb-4">
                    {{ __("Sistem Pakar Diagnosa DBD") }}
                </div>
                <div class="px-10 text-justify text-black text-base leading-relaxed indent-paragraph">
                    <p>
                        Aplikasi berbasis web yang dirancang untuk membantu masyarakat mendeteksi dini penyakit Demam Berdarah Dengue (DBD) berdasarkan gejala yang dirasakan. Aplikasi ini menggunakan metode Dempster-Shafer untuk menganalisis gejala dan memberikan hasil diagnosa awal dengan tingkat keyakinan tertentu, sehingga pengguna dapat mengetahui kemungkinan terkena DBD tanpa harus langsung berkonsultasi dengan dokter.
                    </p>
                </div>
            </div>
        </div>
    </div>    

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-lightblue bg-yellow-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-10 pl-10 text-left text-black">
                <div class="text-left text-2xl font-semibold mb-4">
                    {{ __("Metode Dempster-Shafer") }}
                </div>
                <div class="px-10 text-left text-black text-base leading-relaxed indent-paragraph">
                    <p>
                        Metode Dempster-Shafer digunakan dalam aplikasi ini untuk mengolah dan menggabungkan informasi dari berbagai gejala yang dimasukkan oleh pengguna. Setiap gejala memiliki tingkat keyakinan (belief) terhadap kemungkinan penyakit DBD. Metode ini membantu sistem dalam menangani ketidakpastian dan ambiguitas data, yang sering muncul karena gejala DBD bisa mirip dengan penyakit lain seperti tipes, malaria, atau flu.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-lightblue bg-yellow-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-10 pl-10 text-left text-black">
                <div class="text-left text-2xl font-semibold mb-4">
                    {{ __("Misi") }}
                </div>
                <div class="px-10 text-left text-black text-base leading-relaxed">
                    <ol class="list-decimal pl-5 space-y-2">
                        <li>Meningkatkan kualitas sumber daya manusia yang sehat, cerdas, produktif, bertakwa dan berakhlak mulia menyambut era Society 5.0.</li>
                        <li>Mengembangkan ekonomi kerakyatan berbasis potensi lokal yang mandiri dan berdaya saing sesuai dengan era Industri 4.0.</li>
                        <li>Melanjutkan pembangunan infrastruktur untuk mengurangi kesenjangan serta mendukung peningkatan dan pemerataan pembangunan bidang pendidikan, kesehatan dan ekonomi.</li>
                        <li>Peningkatan pengelolaan dan perlingungan sumber daya alam untuk menjamin keseimbangan alam dan kelangsungan lingkungan hidup.</li>
                        <li>Pemantapan reformasi birokrasi dan transformasi birokrasi pemerintahan untuk menjamin terciptanya pelayanan publik yang semakin baik, profesional, efektif dan efisien serta adaptif menuju era Governance 3.0.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-lightblue bg-yellow-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-10 pl-10 text-left text-black">
                <div class="text-left text-2xl font-semibold mb-4">
                    {{ __("Syarat dan Ketentuan Peminjaman Gedung") }}
                </div>
                <div class="px-10 text-left text-black text-base leading-relaxed">
                    <ol class="list-decimal pl-5 space-y-2">
                        <li>Peminjaman hanya dapat dilakukan oleh individu atau organisasi yang sah (karyawan, mahasiswa, organisasi internal, atau pihak luar dengan izin khusus).</li>
                        <li>Pengguna harus terdaftar dan memiliki akun untuk dapat melakukan peminjaman.</li>
                        <li>Peminjaman gedung hanya dapat dilakukan pada jam operasional yang telah ditentukan (06.00 - 22.00).</li>
                        <li>Pengguna harus memastikan jumlah peserta tidak melebihi kapasitas gedung yang dipilih.</li>
                        <li>Pengguna bertanggung jawab untuk menjaga kebersihan dan keamanan gedung selama peminjaman.</li>
                        <li>Pengguna dapat membatalkan peminjaman dengan memberikan pemberitahuan minimal 24 jam sebelum waktu peminjaman.</li>
                        <li>Pengguna harus mengembalikan gedung dalam kondisi baik dan tepat waktu.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 