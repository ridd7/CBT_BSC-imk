<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'username' => 'admin',
            'nama' => 'Admin',
        ]);

        DB::table('admin')->insert([
            'username' => 'admin2',
            'nama' => 'Admin2',
        ]);
    }
}
