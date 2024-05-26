<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ujian')->insert([
            'id_tentor' => 1,
            'nama_ujian' => 'Try Out 01',
            'slug' => 'try-out-01',
            'token' => 'ABCD',
            'jumlah_soal' => 2,
            'waktu' => 120,
        ]);

        DB::table('ujian')->insert([
            'id_tentor' => 3,
            'nama_ujian' => 'Try Out 02',
            'slug' => 'try-out-02',
            'token' => 'EFGH',
            'jumlah_soal' => 1,
            'waktu' => 60,
        ]);

        DB::table('ujian')->insert([
            'id_tentor' => 5,
            'nama_ujian' => 'Try Out 03',
            'slug' => 'try-out-03',
            'token' => 'QWERTY',
            'waktu' => 90,
        ]);
    }
}
