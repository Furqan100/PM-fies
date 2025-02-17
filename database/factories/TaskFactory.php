<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
        'project_id' => Project::inRandomOrder()->first()->id ?? Project::factory(),
        'name' =>fake()->paragraph() ,
        'description' => fake()->paragraph(),
        // Instead of creating a new user, use an existing one if available
        'assigned_to' => User::inRandomOrder()->first()->id ?? User::factory(),
        'status' => fake()->randomElement(['pending', 'in_progress', 'completed']),

        ];
    }
}
// 'project_id' => Project::factory(),
            // 'name' => $this->faker->randomElement($taskNames),
            // 'description' => fake()->paragraph,
            // 'assigned_to' => User::factory(),
            // 'status' => fake()->randomElement(['pending', 'in_progress', 'completed']),
