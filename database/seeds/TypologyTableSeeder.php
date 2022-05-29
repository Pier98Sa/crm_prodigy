<?php

use App\Typology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = ['Asset','Call','Meeting','Comment'];

        foreach($typologies as $typology){
            $newtypology = new Typology();
            $newtypology->name = $typology;
            $newtypology->slug = Str::slug($typology);
            $newtypology->save();
        }
    }
}
