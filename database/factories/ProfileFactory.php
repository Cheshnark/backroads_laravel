<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'profile_img' => 'https://images.pexels.com/photos/4663107/pexels-photo-4663107.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'description' => $this->faker->realText(200, 2)
        ];
    }
}
