<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JantinaSeeder::class);
        $this->call(KementerianSeeder::class);
        $this->call(AgensiSeeder::class);
        $this->call(PenggunaSeeder::class);
    }
}
