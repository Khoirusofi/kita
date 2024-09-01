<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Galeri::factory(4)->create();
    }
}
