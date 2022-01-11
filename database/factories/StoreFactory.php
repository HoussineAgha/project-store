<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_store'=>$this->faker->company,
            'discription'=>$this->faker->text($maxNbChars = 200),
            'image'=>$this->faker->imageUrl($width = 640, $height = 480),
            'user_id'=> User::factory()
        ];
    }
}
