<?php

namespace Database\Factories;

use App\Models\Ingredients\Ingredient;
use App\Models\Market;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    protected $model = Stock::class;

    public function definition()
    {
        return [
            'ingredient_id' => fn () => Ingredient::factory()->create()->id,
            'market_id' => fn () => Market::factory()->create()->id,
            'quantity' => $this->faker->randomDigit,
            'weight' => $this->faker->randomFloat(),
            'amount_paid' => $this->faker->randomFloat(),
        ];
    }
}
