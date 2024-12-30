<?php

namespace App\Exports;

use App\Models\Achievement;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AchievementsExport implements FromCollection, WithHeadings, WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $prodi;

    // Menerima filter 'prodi' melalui constructor
    public function __construct($prodi)
    {
        $this->prodi = $prodi;
    }

    public function collection()
    {
        // return Achievement::all();
        return Achievement::where('prodi', $this->prodi)->get(['nim','nama','prodi', 'event', 'penyelenggara','tempat','tglMulai','tglAkhir','kategoriPenghargaan','peringkat','level'])
        ->map(function ($item, $index) {
            return [
                'no' => $index + 1, // Nomor urut
                'nim' => $item->nim,
                'name' => $item->nama,
                'prodi' => $item->prodi,
                'event' => $item->event,
                'penyelenggara' => $item->penyelenggara,
                'tempat' => $item->tempat,
                'tglMulai' => $item->tglMulai,
                'tglAkhir' => $item->tglAkhir,
                'kategoriPenghargaan' => $item->kategoriPenghargaan,
                'peringkat' => $item->peringkat,
                'level' => $item->level,
            ];
        });;
    }

    public function headings(): array
    {
        return [
            'NO.',
            'NIM',
            'NAMA',
            'PRODI',
            'EVENT',
            'PENYELENGGARA',
            'TEMPAT',
            'TANGGAL MULAI',
            'TANGGAL AKHIR',
            'KATEGORI PENGHARGAAN',
            'PERINGKAT',
            'LEVEL',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, // Lebar kolom nomor
            'B' => 15, // Lebar kolom nim
            'C' => 35, // Lebar kolom nama
            'D' => 13, // Lebar kolom prodi
            'E' => 50, // Lebar kolom event
            'F' => 40, // Lebar kolom penyelenggara
            'G' => 30, // Lebar kolom tempat
            'H' => 12, // Lebar kolom tglMulai
            'I' => 12, // Lebar kolom tglAkhir
            'J' => 50, // Lebar kolom kategoriPenghargaan
            'K' => 13, // Lebar kolom peringkat
            'L' => 12, // Lebar kolom level
        ];
    }

    // Method styles untuk styling kolom dan header
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Header dibuat tebal
            'A' => ['alignment' => ['horizontal' => 'center']], // Kolom 'No' rata tengah
        ];
    }
}
