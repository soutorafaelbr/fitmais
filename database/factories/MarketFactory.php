<?php

namespace Database\Factories;

use App\Models\Market;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarketFactory extends Factory
{
    protected $model = Market::class;

    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'address' => $this->faker->address,
        ];
    }
}
