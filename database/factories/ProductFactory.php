<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(random_int(10, 20)),
            'barnd' => Str::random(random_int(5, 10)),
            'model' => Str::random(random_int(5, 10)),
            'ram' => random_int(2, 32),
            'storage' => random_int(64, 256),
            'cpu' => Str::random(random_int(5, 10)),
            'width' => random_int(10, 20),
            'hight' => random_int(10, 20),
            'weight' => random_int(10, 20),
            'price' => random_int(10, 20),
            'discount' => random_int(10, 20),
        ];
    }
}
