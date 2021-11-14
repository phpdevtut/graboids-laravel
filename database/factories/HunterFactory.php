<?php

namespace Database\Factories;

use App\Models\Hunter;
use Illuminate\Database\Eloquent\Factories\Factory;

class HunterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hunter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'src' => $this->faker->paragraph,
            'description' => $this->faker->paragraph,
            'name' => $this->faker->paragraph,
        ];
    }
}
