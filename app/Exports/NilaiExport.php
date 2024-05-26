<?php

namespace App\Exports;

use App\Models\Nilai;
use App\Models\Ujian;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NilaiExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $nilai;

    public function __construct(Nilai $nilai)
    {
        $this->nilai = $nilai;
    }

    public function collection()
    {
        return $this->nilai;
    }

    public function map($nilai): array
    {
        return [
            $nilai->siswa->nama,
            $nilai->siswa->asal_sekolah,
            $nilai->nilai,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Asal Sekolah',
            'Nilai'
        ];
    }
}
