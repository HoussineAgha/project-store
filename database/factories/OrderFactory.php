<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\store;
use App\Models\Product;

function getproduct(){
$product=array();
for($i =0 ; $i < rand(1,5); $i++){
    $products= Product::all()->random();
    $product[]=$products;
}
return json_encode($product);
}

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'receipt_id'=>$this->faker->randomNumber($nbDigits = 5, $strict = false),
            'patment_type'=>$this->faker->randomElement($array = array ('visa','paypal','cache')),
            'status'=>$this->faker->randomElement($array = array ('delivered','pending','done','failed')),
            'product'=>getproduct(),
            'store_id'=>store::factory(),
            'user_id'=>User::factory(),
        ];
    }
}
