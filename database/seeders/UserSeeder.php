<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'email' => 's_admin@mail.com',
            'password' => Hash::make('super_admin'),
            'jabatans_id' => 1,
            'wargas_id' => 1,
            'status' => "aktif",
        ]);
    }
}
