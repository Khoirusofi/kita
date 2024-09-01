<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carousel::factory(1)->create();
    }
}
