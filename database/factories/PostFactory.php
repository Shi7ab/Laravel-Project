<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

/**
 * @extends Factory<Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'description' => $this->faker->text(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
