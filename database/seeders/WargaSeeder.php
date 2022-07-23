<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wargas')->insert([
            'nik' => 123456789,
            'nama_warga' => 'Dumy Name',
            'tanggal_lahir' => '2002-02-01',
            'tempat_lahir' => 'Surabaya',
            'status_perkawinan' => 'none',
            'alamat' => 'none',
            'no_telp' => '0865323421',
            'no_kk' => 1234567890,
            'agama' => 'islam',
            'jenis_kelamin' => 'pria',
            'pekerjaan' => 'none',
        ]);
    }
}
