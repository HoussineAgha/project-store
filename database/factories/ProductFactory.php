<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'discount'=>$this->faker->randomFloat($nbMaxDecimals = 3, $min = 1, $max = 10),
            'image'=>$this->faker->imageUrl($width = 640, $height = 480),
            'gallery'=>$this->faker->imageUrl($width = 640, $height = 480),
            'discription'=>$this->faker->text($maxNbChars = 50),
            'discription_long'=>$this->faker->text($maxNbChars = 200),
            'store_id'=>Store::factory(),
            'cat_id'=>Categury::factory(),
        ];
    }
}
