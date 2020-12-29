<?php

namespace Database\Factories;

use App\Models\Ingredients\Ingredient;
use App\Models\Meals\Meal;
use App\Models\Meals\MealType;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    protected $model = Meal::class;

    public function definition()
    {
        return [
            'user_id' => fn () => User::factory()->create()->id,
            'ingredient_id' => fn () => Ingredient::factory()->create()->id,
            'meal_type_id' => fn () => MealType::factory()->create()->id,
            'title' => $this->faker->text(20),
        ];
    }
}
