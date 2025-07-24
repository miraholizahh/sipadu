<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Riwayat Diagnosa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin: 40px;
            color: #000;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 20px;
        }

        p {
            margin: 5px 0;
        }

        .label {
            display: inline-block;
            width: 160px;
            font-weight: bold;
        }

        ul {
            margin-top: 5px;
            margin-left: 20px;
        }

        .box {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }

        .section {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h2>Detail Riwayat Diagnosa DBD</h2>

    <div class="box">
        <div class="section">
            <p><span class="label">Nama</span>: {{ $diagnosis->user->nama ?? '-' }}</p>
            <p><span class="label">Jenis Kelamin</span>: {{ $diagnosis->user->jenis_kelamin ?? '-' }}</p>
            <p><span class="label">Tanggal Diagnosa</span>: {{ \Carbon\Carbon::parse($diagnosis->tanggal_diagnosa)->format('d-m-Y') }}</p>
        </div>

        <div class="section">
            <p><span class="label">Penyakit</span>: {{ $diagnosis->disease->nama_penyakit ?? '-' }}</p>
            <p><span class="label">Kemungkinan</span>: {{ $diagnosis->hasil_diagnosa ?? '-' }}%</p>
            <p><span class="label">Solusi</span>: {{ $diagnosis->disease->solusi ?? '-' }}</p>
        </div>

        <div class="section">
            <p><span class="label">Gejala yang Dipilih</span>:</p>
            <ul>
                @foreach ($diagnosis->symptom as $symptom)
                    <li>{{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}</li>
                @endforeach
            </ul>
        </div>
    </div>

</body>
</html>
