<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i < 50 ; $i++){
            $newClient = new Client();
            $newClient->business_name = $faker->company();
            $newClient->address = $faker->streetAddress();
            $newClient->city = $faker->city();
            $newClient->postal_code = $faker->numerify('#####');
            $newClient->email = $faker->email();
            $newClient->phone_number = $faker->numerify('##########');
            $newClient->vat_number = $faker->numerify('###########');
            $newClient->iban = $faker->numerify('IT#########################');
            $newClient->user_id = $faker->numberBetween(1, 10);
            $newClient->save();

        }
    }
}
