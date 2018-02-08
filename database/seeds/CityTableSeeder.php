<?php

use Illuminate\Database\Seeder;
use App\City;

class CityTableSeeder extends Seeder {

    public function run() {
        //DB::table('city')->delete();
        // Überall in Deutschland
        City::create(array(
            'name' => "Überall in Deutschland"
        ));

        // Köln
        City::create(array(
            'name' => "Köln"
        ));

        // Berlin
        City::create(array(
            'name' => "Berlin"
        ));

        // München
        City::create(array(
            'name' => "München"
        ));

        // Hamburg
        City::create(array(
            'name' => "Hamburg"
        ));

        // Stuttgart
        City::create(array(
            'name' => "Stuttgart"
        ));

        // Dresden
        City::create(array(
            'name' => "Dresden"
        ));
    }

}
