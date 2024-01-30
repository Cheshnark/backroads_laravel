<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $userId = User::inRandomOrder()->first()->id;
    $commentsArray = array(
      array (
          "user" => 'Jambo',
          "comment" => 'Mal, huele raro.'
      ),
      array (
          "user" => 'Tron',
          "comment" => 'Te hacen unas lentejas que flipas'
      ),
      array (
          "user" => 'Mambo',
          "comment" => 'Tienen cáctus enormes, casas dentro de cáctus incluso.'
      )
      );
      
      $jsonArr = json_encode($commentsArray);

      $imgArray = [
				'https://images.pexels.com/photos/14058684/pexels-photo-14058684.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
				'https://images.pexels.com/photos/7442171/pexels-photo-7442171.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
				'https://images.pexels.com/photos/19977700/pexels-photo-19977700/free-photo-of-acantilado-cascada-rock-california.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
			];

      $imgJson = json_encode($imgArray);
      $servicesJson = json_encode(['water'=>true, 'electricity'=>false]);

      return [
          'user_id' => $userId,
          'coordinates' => '158.58.95 - 35-95-148',
          'title' => $this->faker->words(2, true),
          'body' => $this->faker->realText(200, 2),
          'location_type' => 'camping',
          'address' => $this->faker->streetName(),
          'services' => $servicesJson,
          'price' => $this->faker->randomFloat(),
          'opening_hours' => $this->faker->sentence(3),
          'score' => $this->faker->randomFloat(1, 1, 5),
          'comments' => $jsonArr,
          'images' => $imgJson
      ];
    }
}
