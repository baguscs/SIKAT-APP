<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatans')->insert([
            'nama_jabatan' => 'Super Admin',
        ]);
        DB::table('jabatans')->insert([
            'nama_jabatan' => 'Admin',
        ]);
        DB::table('jabatans')->insert([
            'nama_jabatan' => 'Bendahara',
        ]);
        DB::table('jabatans')->insert([
            'nama_jabatan' => 'Warga',
        ]);
    }
}
