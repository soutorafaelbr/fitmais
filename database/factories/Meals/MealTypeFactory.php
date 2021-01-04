<?php

namespace Database\Factories\Meals;

use App\Models\Meals\MealType;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealTypeFactory extends Factory
{
    protected $model = MealType::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20),
        ];
    }
}
