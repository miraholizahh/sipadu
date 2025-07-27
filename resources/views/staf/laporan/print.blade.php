<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Diagnosa</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        thead { background: #eee; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Diagnosa</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal</th>
                <th>Penyakit</th>
                <th>Kemungkinan</th>
                <th>Solusi</th>
                <th>Gejala</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($diagnosis as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->user->nama ?? '-' }}</td>
                    <td>{{ $item->user->jenis_kelamin ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_diagnosa)->format('d-m-Y') }}</td>
                    <td>{{ $item->disease->nama_penyakit ?? '-' }}</td>
                    <td>
                        {{ $item->hasil_diagnosa ?? '-' }}%
                        @php
                            $percent = $item->hasil_diagnosa;
                            if ($percent == 100) $desc = "Sangat Yakin";
                            elseif ($percent >= 80) $desc = "Kemungkinan Besar";
                            elseif ($percent >= 51) $desc = "Kemungkinan";
                            elseif ($percent >= 0) $desc = "Sedikit Kemungkinan";
                            else $desc = "Tidak Diketahui";
                        @endphp
                        ({{ $desc }})
                    </td>
                    <td>
                        <ul>
                            @forelse ($item->disease->solutions as $solusi)
                                <li>{{ $solusi->solusi }}</li>
                            @empty
                                <li>-</li>
                            @endforelse
                        </ul>
                    </td>
                    
                    <td>
                        <ul>
                            @foreach ($item->symptom as $symptom)
                                <li>{{ $symptom->kode_gejala }} - {{ $symptom->nama_gejala }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
