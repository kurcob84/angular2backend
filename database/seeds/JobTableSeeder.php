<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobTableSeeder extends Seeder {

    public function run() {
        //DB::table('job')->delete();
        // Teamleiter gesucht
        Job::create(array(
            'title' => "Teamleiter gesucht",
            'description' => "Teamleiter gesucht ganz schnell",
            'salary' => "2000",
            'company_id' => 1
        ));

        // Entwickler gesucht
        Job::create(array(
            'title' => "Entwickler gesucht",
            'description' => "Entwickler gesucht bald",
            'salary' => "1000",
            'company_id' => 2
        ));
    }

}
