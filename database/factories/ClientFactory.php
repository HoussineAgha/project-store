<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\store;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname'=>$this->faker->name(),
            'email'=>$this->faker->unique()->freeEmail(),
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'=>$this->faker->phoneNumber(),
            'role'=>'buyer',
            'image'=>$this->faker->imageUrl($width = 640, $height = 480),
            'store_id'=> store::factory()
        ];
    }
}
