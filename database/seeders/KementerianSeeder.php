<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KementerianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $senaraiKementerian = [
            [
                'id' => 1,
                'nama' => 'Jabatan Perdana Menteri'
            ],
            [
                'id' => 2,
                'nama' => 'KPWKM'
            ],
        ];

        DB::table('kementerian')->insert($senaraiKementerian);
    }
}
