<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tentor')->insert([
            'username' => 'budi',
            'nama' => 'Budi',
        ]);

        DB::table('tentor')->insert([
            'username' => 'siti',
            'nama' => 'Siti',
        ]);

        DB::table('tentor')->insert([
            'username' => 'andi',
            'nama' => 'Andi',
        ]);

        DB::table('tentor')->insert([
            'username' => 'susilo',
            'nama' => 'Susilo',
        ]);

        DB::table('tentor')->insert([
            'username' => 'bunga',
            'nama' => 'Bunga',
        ]);
    }
}
