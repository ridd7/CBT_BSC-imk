<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'username' => 'admin2',
            'nama' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'admin',
        ]);

        // ============================================================== //

        DB::table('users')->insert([
            'username' => 'budi',
            'nama' => 'Budi',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'tentor',
        ]);

        DB::table('users')->insert([
            'username' => 'siti',
            'nama' => 'Siti',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'tentor',
        ]);

        DB::table('users')->insert([
            'username' => 'andi',
            'nama' => 'Andi',
            'email' => 'andi@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'tentor',
        ]);

        DB::table('users')->insert([
            'username' => 'susilo',
            'nama' => 'Susilo',
            'email' => 'susilo@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'tentor',
        ]);

        DB::table('users')->insert([
            'username' => 'bunga',
            'nama' => 'Bunga',
            'email' => 'bunga@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'tentor',
        ]);

        // ============================================================== //

        DB::table('users')->insert([
            'username' => 'doni',
            'nama' => 'Doni',
            'email' => 'doni@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);

        DB::table('users')->insert([
            'username' => 'rizki',
            'nama' => 'Rizki',
            'email' => 'rizki@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);

        DB::table('users')->insert([
            'username' => 'bayu',
            'nama' => 'Bayu',
            'email' => 'bayu@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);

        DB::table('users')->insert([
            'username' => 'monica',
            'nama' => 'Monica',
            'email' => 'monica@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);

        DB::table('users')->insert([
            'username' => 'angel',
            'nama' => 'Angel',
            'email' => 'angel@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);

        DB::table('users')->insert([
            'username' => 'farhan',
            'nama' => 'Farhan',
            'email' => 'farhan@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);

        DB::table('users')->insert([
            'username' => 'iqbal',
            'nama' => 'Iqbal',
            'email' => 'iqbal@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);

        DB::table('users')->insert([
            'username' => 'bella',
            'nama' => 'Bella',
            'email' => 'bella@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);

        DB::table('users')->insert([
            'username' => 'nadia',
            'nama' => 'Nadia',
            'email' => 'nadia@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);

        DB::table('users')->insert([
            'username' => 'putri',
            'nama' => 'Putri',
            'email' => 'putri@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'role' => 'siswa',
        ]);
    }
}
