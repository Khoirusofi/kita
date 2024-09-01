<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carousel>
 */
class ContentFactory extends Factory
{
    protected $model = Content::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'img1' => '' . $this->faker->image('public/storage/content', 640, 480, null, false),
            'img2' => '' . $this->faker->image('public/storage/content', 640, 480, null, false),
            'img3' => '' . $this->faker->image('public/storage/content', 640, 480, null, false),
            'img4' => '' . $this->faker->image('public/storage/content', 640, 480, null, false),
            'title1' => $this->faker->sentence,
            'title2' => $this->faker->sentence,
            'place' => $this->faker->city,
            'tgl' => $this->faker->date,
        ];
    }
}
