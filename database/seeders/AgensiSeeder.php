<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $senaraiAgensi = [
            [
                'id' => 1,
                'nama' => 'ICUJPM',
                'id_kementerian' => 1
            ],
            [
                'id' => 2,
                'nama' => 'JKM',
                'id_kementerian' => 2
            ],
        ];

        DB::table('agensi')->insert($senaraiAgensi);
    }
}
