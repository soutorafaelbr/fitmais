<?php

namespace Tests\Feature;

use App\Models\Ingredients\Ingredient;
use App\Models\Meals\Meal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MealTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        Carbon::setTestNow();
    }

    /** @test */
    public function shouldReturnAllByAuthenticatedUser()
    {
        $user = User::factory()->create();
        $meals = Meal::factory()->for($user)->create();

        $this->actingAs($user)
            ->getJson(route('meals.index'))
            ->assertJson([
                'data' => [$meals->toArray()]
            ]);
    }

    /** @test */
    public function testShouldReturnASpecificOne()
    {
        $meal       = Meal::factory()->create();
        $attributes = $meal->toArray();

        $this->actingAs($meal->user)
            ->getJson(route('meals.show', $meal->user_id))
            ->assertJson([
                'data' => $attributes
            ]);
    }

    /** @test */
    public function shouldStoreWithinItsIngredients()
    {
        $meal             = Meal::factory()->make();
        $yogurt           = Ingredient::factory()->create(['name' => 'yogurt']);
        $fruits           = Ingredient::factory()->create(['name' => 'fruits']);
        $peanutButter     = Ingredient::factory()->create(['name' => 'peanut butter']);

        $response = $this->actingAs($meal->user)
            ->postJson(
                route('meals.store', $meal->user_id),
                [
                    'meal' => $meal->toArray(),
                    'ingredients' => [
                        $yogurt->id,
                        $fruits->id,
                        $peanutButter->id,
                    ]
                ]
            );

        $response->assertCreated();
        $mealId = json_decode($response->content())->data->id;
        $this->assertDatabaseHas('meals', $meal->unsetRelation('user')->toArray());
        $this->assertDatabaseHas('ingredient_meal', ['ingredient_id' => $yogurt->id, 'meal_id' => $mealId]);
        $this->assertDatabaseHas('ingredient_meal',  ['ingredient_id' => $peanutButter->id, 'meal_id' => $mealId]);
        $this->assertDatabaseHas('ingredient_meal',  ['ingredient_id' => $fruits->id, 'meal_id' => $mealId]);
    }

    /** @test */
    public function shouldDestroyWithinItsIngredients()
    {
        $meal = Meal::factory()->create();

        $this->actingAs($meal->user)
            ->deleteJson(route('meals.destroy', $meal->id))
            ->assertNoContent();

        $this->assertDatabaseHas('meals', ['deleted_at' => now()]);
    }
}
