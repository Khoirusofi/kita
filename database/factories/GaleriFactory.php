<?php

namespace Database\Factories;

use App\Models\Galeri;
use Illuminate\Database\Eloquent\Factories\Factory;

class GaleriFactory extends Factory
{
    protected $model = Galeri::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'img' => '' . $this->faker->image('public/storage/galeri', 640, 480, null, false),
        ];
    }
}
