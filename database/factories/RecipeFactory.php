<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'difficulty' => $this->faker->randomElement($array = [1, 2, 3]),
            'calories' => $this->faker->optional()->randomDigit(),
            'serving' => $this->faker->randomDigit(),
            'preparation_time' => $this->faker->sentence(),
            'user_id' => User::factory(),
        ];
    }
}
