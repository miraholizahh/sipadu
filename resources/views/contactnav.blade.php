<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontak</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .content {
            flex: 1;
        }
        .justified-text {
            text-align: justify;
            width: 80%; 
            max-width: 800px; 
            margin: auto;
            padding-top: 25px;
            background-color: lightblue; 
            padding: 10px; 
            border-radius: 8px; 
        }
        .text-bold {
            font-weight: bold;
        }
        .text-2x {
            font-size: 2em;
        }
    </style>
</head>
<body>
    <x-navbar></x-navbar>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-lightblue bg-yellow-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-10 pl-10 text-left text-black">
                <div class="text-left text-2xl font-semibold mb-4">
                    {{ __("Hubungi Kami") }}
                </div>
                <div class="px-10 text-left text-black text-base leading-relaxed">
                    <p>Alamat</p>
                    <p>Jl. Surya Kencana, Sawah Gede, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43212</p>
                    <br> 
                    <p>Telepon</p>
                    <p>0812-9011-7250</p>
                    <br> 
                    <p>Email</p>
                    <p>pkmcianjurkota.registrasi@gmail.com</p>
                    <br> 
                    <p>Instagram</p>
                    <p>puskesmas_cianjurkota</p> 
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>
