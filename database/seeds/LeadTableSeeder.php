<?php

use App\Lead;
use Illuminate\Database\Seeder;

class LeadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i < 20 ; $i++){
            $newLead = new Lead();
            $newLead->name = $faker->company();
            $newLead->email = $faker->email();
            $newLead->phone_number = $faker->numerify('##########');
            $newLead->description = $faker->sentence();
            
            $newLead->save();

        }
    }
}
