<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CateguryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text($maxNbChars = 20),
            'discription'=>$this->faker->text($maxNbChars = 50),
            'image'=>$this->faker->imageUrl($width = 200, $height = 200),
        ];
    }
}
