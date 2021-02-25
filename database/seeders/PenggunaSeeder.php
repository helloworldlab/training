<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $senaraiPengguna = [
            [
                'nama' => 'Ali Hanafi',
                'no_kp' => '111111111111',
                'id_jantina' => 1,
                'id_agensi' => 1,
                'emel' => 'ali@gmail.com',
                'kata_laluan' => bcrypt('password'),
                'no_telefon' => '01124357878',
                'tarikh_cipta' => now(),
                'tarikh_kemaskini' => now(),
            ],
        ];

        DB::table('pengguna')->insert($senaraiPengguna);
    }
}
