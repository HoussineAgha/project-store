<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->text($maxNbChars = 25),
            'discription'=>$this->faker->text($maxNbChars = 100),
            'user_id'=>User::factory(),
        ];
    }
}
