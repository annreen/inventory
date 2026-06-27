<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'name' => fake()->words(2, true),
            'quantity' => fake()->numberBetween(1, 100),
            'price' => fake()->numberBetween(10000, 1000000),
        ];
    }
}