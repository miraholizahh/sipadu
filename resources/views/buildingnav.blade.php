<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Gedung</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-navbar></x-navbar>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
        @foreach($buildings as $building)
            <x-card 
                :imageSrc="asset('storage/foto_gedung/'.$building->foto)" 
                :title="$building->nama_gedung" 
                :status="$building->status ? 'Available' : 'Unavailable'"
                :id="$building->id"
            />
        @endforeach
    </div>
</body>
</html>
</body>
</html>
