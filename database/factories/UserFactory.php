<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {          $users=[
               "Furqan Lateef",
               "Mahirah Shabir",
               "Burhan Lateef",
               "Mohd Toyib",
               "Zubair Ahmad",
               "Junaid Farooq",
               "Kashif Qadri",
               "Samiaya",
               "Arshaan Qureshi",
               "Raouf Ahmad"

    ];
    // static $usedNames = [];

    // // Randomly pick a name from the remaining ones
    // $name = $this->faker->unique()->randomElement($users);

    // // Ensure the name is not repeated
    // while (in_array($name, $usedNames)) {
    //     $name = $this->faker->unique()->randomElement($users);
    // }

    // // Add the picked name to the used names
    // $usedNames[] = $name;
        return [
            'name' =>$this->faker->randomElement($users)  ,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
