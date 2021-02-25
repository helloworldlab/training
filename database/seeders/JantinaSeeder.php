<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Jantina;

class JantinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $senaraiJantina = [
            [
                'nama' => 'Lelaki'
            ],
            [
                'nama' => 'Perempuan'
            ],
            [
                'nama' => 'Ragu'
            ]
        ];

        // Cara 1 (Query Builder)
        // DB::table('jantina')->insert($senaraiJantina);
        // Cara 2 (Eloquent Model)
        Jantina::insert($senaraiJantina);
    }
}
