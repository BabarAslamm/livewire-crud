<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = collect(Category::pluck('id'));

        return [
            'category_id' => $categories->random(), 
            'name'        => $this->faker->name(),
            'description' => $this->faker->text(50),
        ];
    }
}
