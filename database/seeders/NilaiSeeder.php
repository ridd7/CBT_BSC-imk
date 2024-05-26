<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 1,
            'nilai' => 100,
            'tanggal' => now(),
        ]);

        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 2,
            'nilai' => 90,
            'tanggal' => now(),
        ]);

        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 3,
            'nilai' => 80,
            'tanggal' => now(),
        ]);

        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 4,
            'nilai' => 90,
            'tanggal' => now(),
        ]);

        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 5,
            'nilai' => 100,
            'tanggal' => now(),
        ]);

        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 6,
            'nilai' => 90,
            'tanggal' => now(),
        ]);

        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 7,
            'nilai' => 100,
            'tanggal' => now(),
        ]);

        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 8,
            'nilai' => 80,
            'tanggal' => now(),
        ]);

        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 9,
            'nilai' => 80,
            'tanggal' => now(),
        ]);

        DB::table('nilai')->insert([
            'id_ujian' => 1,
            'id_siswa' => 10,
            'nilai' => 100,
            'tanggal' => now(),
        ]);
    }
}
