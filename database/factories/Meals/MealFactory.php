<?php

namespace Database\Factories\Meals;

use App\Models\Ingredients\Ingredient;
use App\Models\Meals\Meal;
use App\Models\Meals\MealType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    protected $model = Meal::class;

    public function definition()
    {
        return [
            'user_id' => fn () => User::factory()->create()->id,
            'meal_type_id' => fn () => MealType::factory()->create()->id,
            'title' => $this->faker->text(20),
        ];
    }

    public function configure(): MealFactory
    {
        return $this->afterCreating(function(Meal $meal) {
            $meal->ingredients()->sync(
                [
                    Ingredient::factory()->create(['name' => 'yogurt'])->id,
                    Ingredient::factory()->create(['name' => 'fruits'])->id,
                    Ingredient::factory()->create(['name' => 'peanut butter'])->id,
                ]
            );
        });
    }
}
