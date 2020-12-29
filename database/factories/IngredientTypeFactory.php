<?php

namespace Database\Factories;

use App\Models\Ingredients\IngredientType;
use App\Models\Model;
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
