<?php

namespace Database\Factories;

use App\Models\Ingredients\Ingredient;
use App\Models\Ingredients\IngredientType;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
            'ingredient_type_id' => fn () => IngredientType::factory()->create()->id,
            'measured_by' => $this->faker->randomElement(['unit', 'weight']),
        ];
    }
}
