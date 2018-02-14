<?php

use Illuminate\Database\Seeder;
use App\Models\Job\JobLanguage;

class JobLanguageTableSeeder extends Seeder {

    public function run() {
        //DB::table('job_language')->delete();
        // Teamleiter gesucht
        JobLanguage::create(array(
            'job_id' => 1,
            'language_id' => 1
        ));

        // Teamleiter gesucht
        JobLanguage::create(array(
            'job_id' => 1,
            'language_id' => 2
        ));

        // Entwickler gesucht
        JobLanguage::create(array(
            'job_id' => 2,
            'language_id' => 3
        ));

        // Entwickler gesucht
        JobLanguage::create(array(
            'job_id' => 2,
            'language_id' => 1
        ));
    }

}
