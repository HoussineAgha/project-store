<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\store;

class ProductFactory extends Factory
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
            'price'=>$this->faker->randomFloat($nbMaxDecimals = 3, $min = 1, $max = 10),
            'image'=>$this->faker->imageUrl($width = 640, $height = 480),
            'discription'=>$this->faker->text($maxNbChars = 50),
            'store_id'=>store::factory(),
        ];
    }
}
