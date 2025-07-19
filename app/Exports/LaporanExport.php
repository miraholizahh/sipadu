<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class LaporanExport implements FromCollection, FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Laporan::all();
    }

    public function array(): array
    {
        return Laporan::getDataLaporan();
    }

    public function headings(): array
    {
        return [
            'No',
            'Instansi',
            'Nama Gedung',
            'Agenda',
            'Tanggal Peminjaman',
            'Waktu Peminjaman',
            'Jumlah Peserta',
            'File',
            'Status'
        ];
    }
}
