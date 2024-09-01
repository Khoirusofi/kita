<?php

namespace Database\Factories;

use App\Models\Carousel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarouselFactory extends Factory
{
    protected $model = Carousel::class;

    public function definition()
    {
        return [
            'img1' => '' . $this->faker->image('public/storage/img', 640, 480, null, false),
            'img2' => '' . $this->faker->image('public/storage/img', 640, 480, null, false),
            'img3' => '' . $this->faker->image('public/storage/img', 640, 480, null, false),
            'img4' => '' . $this->faker->image('public/storage/img', 640, 480, null, false),
            'img5' => '' . $this->faker->image('public/storage/img', 640, 480, null, false),
            'title1' => $this->faker->sentence,
            'title2' => $this->faker->sentence,
            'title3' => $this->faker->sentence,
        ];
    }
}
