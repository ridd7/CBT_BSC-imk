<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
            'username' => 'doni',
            'nama' => 'Doni',
            'asal_sekolah' => 'SMAN 2',
        ]);

        DB::table('siswa')->insert([
            'username' => 'rizki',
            'nama' => 'Rizki',
            'asal_sekolah' => 'SMAN 2',
        ]);

        DB::table('siswa')->insert([
            'username' => 'bayu',
            'nama' => 'Bayu',
            'asal_sekolah' => 'SMAN 1',
        ]);

        DB::table('siswa')->insert([
            'username' => 'monica',
            'nama' => 'Monica',
            'asal_sekolah' => 'MAN 1',
        ]);

        DB::table('siswa')->insert([
            'username' => 'angel',
            'nama' => 'Angel',
            'asal_sekolah' => 'MAN 1',
        ]);

        DB::table('siswa')->insert([
            'username' => 'farhan',
            'nama' => 'Farhan',
            'asal_sekolah' => 'MAN 2',
        ]);

        DB::table('siswa')->insert([
            'username' => 'iqbal',
            'nama' => 'Iqbal',
            'asal_sekolah' => 'MAN 1',
        ]);

        DB::table('siswa')->insert([
            'username' => 'bella',
            'nama' => 'Bella',
            'asal_sekolah' => 'MAN 2',
        ]);

        DB::table('siswa')->insert([
            'username' => 'nadia',
            'nama' => 'Nadia',
            'asal_sekolah' => 'SMAN 1',
        ]);

        DB::table('siswa')->insert([
            'username' => 'putri',
            'nama' => 'Putri',
            'asal_sekolah' => 'SMAN 1',
        ]);
    }
}
