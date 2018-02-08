<?php

use Illuminate\Database\Seeder;
use App\JobJobtype;

class JobJobtypeTableSeeder extends Seeder {

    public function run() {
        //DB::table('job_jobtype')->delete();
        // Teamleiter gesucht
        JobJobtype::create(array(
            'job_id' => 1,
            'jobtype_id' => 1
        ));

        // Teamleiter gesucht
        JobJobtype::create(array(
            'job_id' => 1,
            'jobtype_id' => 2
        ));

        // Entwickler gesucht
        JobJobtype::create(array(
            'job_id' => 2,
            'jobtype_id' => 3
        ));

        // Entwickler gesucht
        JobJobtype::create(array(
            'job_id' => 2,
            'jobtype_id' => 2
        ));
    }

}
