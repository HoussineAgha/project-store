<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount'=>$this->faker->randomFloat($nbMaxDecimals = 3, $min = 1, $max = 10),
            'payment_method'=>$this->faker->randomElement($array = array ('visa','paypal','cache','mada')),
            'store_id'=>Store::factory(),
            'user_id'=>User::factory(),
            'order_id'=>Order::factory(),
        ];
    }
}
