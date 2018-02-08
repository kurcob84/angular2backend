<?php

use Illuminate\Database\Seeder;
use App\ApplicantCity;

class ApplicantCityTableSeeder extends Seeder {

    public function run() {
        //DB::table('applicant_city')->delete();
        // Patrick
        ApplicantCity::create(array(
            'applicant_id' => 1,
            'city_id' => 7
        ));

        // Tester
        ApplicantCity::create(array(
            'applicant_id' => 2,
            'city_id' => 3
        ));
    }

}
