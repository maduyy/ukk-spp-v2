<?php

namespace App\Exports;

use App\Models\Pembayaran;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pembayaran::all()->map(function ($row) {
            return [
                'petugas' => $row->user->nama_petugas,
                'nisn' => $row->siswa->nisn,
                'spp' => $row->siswa->spp->nominal,
                'bulan_dibayar' => $row->bulan_dibayar,
                'jumlah_bayar' => $row->jumlah_bayar,
                'sisa_tunggakan' => $row->total,
                'tgl_bayar' => $row->tgl_bayar,
                'status' => $row->status
            ];
        });
    }
    public function headings(): array
    {
        return [
            'Petugas',
            'Nisn',
            'Spp',
            'Bulan dibayar',
            'Jumlah Bayar',
            'Sisa Tunggakan',
            'Tanggal Bayar',
            'Status',
        ];
    }
}
