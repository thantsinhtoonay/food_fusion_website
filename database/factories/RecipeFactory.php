<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'ingredients' => $this->faker->paragraph(2),
            'instructions' => $this->faker->paragraph(4),
            'image_path' => 'uploads/sample.jpg',
            'user_id' => 1, 
        ];
    }
}
