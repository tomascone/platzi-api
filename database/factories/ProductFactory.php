<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(1000, 6000),
            'category_id' => function () {
                return Category::query()->inRandomOrder()->first()->id;
            },
            'created_by' => User::firstWhere('name', 'admin'),
        ];
    }
}
