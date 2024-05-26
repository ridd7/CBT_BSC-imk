<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('soal')->insert([
            'id_ujian' => 1,
            'isi_soal' => '1 + 1 = ...',
            'pil_a' => '1',
            'pil_b' => '2',
            'pil_c' => '3',
            'pil_d' => '4',
            'pil_e' => '5',
            'kunci_jawaban' => 'B',
        ]);

        DB::table('soal')->insert([
            'id_ujian' => 1,
            'isi_soal' => '5 x 5 = ...',
            'pil_a' => '21',
            'pil_b' => '22',
            'pil_c' => '23',
            'pil_d' => '24',
            'pil_e' => '25',
            'kunci_jawaban' => 'E',
        ]);

        DB::table('soal')->insert([
            'id_ujian' => 2,
            'isi_soal' => 'Berikut yang merupakan hewan berkaki dua adalah...',
            'pil_a' => 'Kambing',
            'pil_b' => 'Kuda',
            'pil_c' => 'Ayam',
            'pil_d' => 'Ular',
            'pil_e' => 'Ikan',
            'kunci_jawaban' => 'E',
        ]);
    }
}
