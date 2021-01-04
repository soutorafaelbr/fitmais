<?php

namespace Database\Factories\Ingredients;

use App\Models\Ingredients\IngredientType;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientTypeFactory extends Factory
{
    protected $model = IngredientType::class;

    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
        ];
    }
}
