<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(15)->create();
        \App\Models\Product::factory(30)->create();
        \App\Models\Order::factory(20)->create();
        \App\Models\Profile::factory(15)->create();
        \App\Models\store::factory(10)->create();


    }
}












