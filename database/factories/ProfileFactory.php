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
            'id' => uuid_create(),
            'user_id' => '9b3d2133-84e1-4133-9026-00063c518e44',
            'name' => $this->faker->lastName(),
            'profile_img' => 'https://images.pexels.com/photos/4663107/pexels-photo-4663107.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'description' => $this->faker->realText(200, 2)
        ];
    }
}
