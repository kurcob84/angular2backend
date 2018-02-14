<?php

use Illuminate\Database\Seeder;
use App\Models\Misc\Benefit;

class BenefitTableSeeder extends Seeder {

    public function run() {
        //DB::table('benefit')->delete();
        // Free Beverages
        Benefit::create(array(
            'name' => "Free Beverages"
        ));

        // Free Fruits
        Benefit::create(array(
            'name' => "Free Fruits"
        ));

        // Health Insurance for colleagues in the UK
        Benefit::create(array(
            'name' => "Health Insurance for colleagues in the UK"
        ));

        // Home office acceptance
        Benefit::create(array(
            'name' => "Home office acceptance"
        ));

        // Sport and health services
        Benefit::create(array(
            'name' => "Sport and health services"
        ));

        // individuelle Arbeitsplatzgestaltung
        Benefit::create(array(
            'name' => "individuelle Arbeitsplatzgestaltung"
        ));
    }

}
