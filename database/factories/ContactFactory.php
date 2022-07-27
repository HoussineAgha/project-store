<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mame_client'=>$this->faker->userName,
            'email'=>$this->faker->email,
            'phone'=>$this->faker->phone,
            'country'=>$this->faker->country,
            'subject'=>$this->faker->text($maxNbChars = 25),
            'message'=>$this->faker->text($maxNbChars = 100),
            'store_id'=>store::factory(),
            'user_id'=>User::factory(),
        ];
    }
}
