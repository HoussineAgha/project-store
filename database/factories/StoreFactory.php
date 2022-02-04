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
            'Baner'=>$this->faker->imageUrl($width = 640, $height = 480),
            'logo'=>$this->faker->imageUrl($width = 225, $height = 75),
            'text_top'=>$this->faker->text($maxNbChars = 50),
            'face'=>$this->faker->url,
            'twite'=>$this->faker->url,
            'linkdine'=>$this->faker->url,
            'youtube'=>$this->faker->url,
            'text_footer'=>$this->faker->text($maxNbChars = 20),
            'opening_times'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'close_times'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'email'=>$this->faker->unique()->safeEmail(),
            'phone'=>$this->faker->phoneNumber,
            'user_id'=> User::factory()
        ];
    }
}
