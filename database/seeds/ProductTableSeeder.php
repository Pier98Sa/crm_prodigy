<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 20; $i++) { 
            $newProduct = new Product();
            $newProduct->name = $faker->words(3, true);
            $newProduct->price = 1000;
            $newProduct->description = $faker->sentence();

            $newProduct->save();
        }
    }
}
