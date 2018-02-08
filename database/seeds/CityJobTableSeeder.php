<?php

use Illuminate\Database\Seeder;
use App\CityJob;

class CityJobTableSeeder extends Seeder {

    public function run() {
        //DB::table('city_job')->delete();
        // Teamleiter gesucht
        CityJob::create(array(
            'job_id' => 1,
            'city_id' => 1
        ));

        // Teamleiter gesucht
        CityJob::create(array(
            'job_id' => 1,
            'city_id' => 2
        ));

        // Entwickler gesucht
        CityJob::create(array(
            'job_id' => 2,
            'city_id' => 3
        ));

        // Entwickler gesucht
        CityJob::create(array(
            'job_id' => 2,
            'city_id' => 4
        ));
    }

}
