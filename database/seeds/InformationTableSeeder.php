<?php

use App\Information;
use Illuminate\Database\Seeder;

class InformationTableSeeder extends Seeder
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
            $newInformation = new Information();
            $newInformation->title = $faker->words(3, true);
            $newInformation->comment = $faker->sentence();
            $newInformation->deadline = $faker->date();
            $newInformation->user_id = $faker->numberBetween(1, 10);;
            $newInformation->typology_id =$faker->numberBetween(1, 4);;
            $newInformation->Client_id = $faker->numberBetween(1, 50);;

            $newInformation->save();
        }
    }
}
