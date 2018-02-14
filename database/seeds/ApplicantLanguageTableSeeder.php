<?php

use Illuminate\Database\Seeder;
use App\Models\Applicant\ApplicantLanguage;

class ApplicantLanguageTableSeeder extends Seeder {

    public function run() {
        //DB::table('applicant_language')->delete();
        // Patrick
        ApplicantLanguage::create(array(
            'applicant_id' => 1,
            'language_id' => 1,
            'language_skill_id' => 1
        ));

        // Patrick
        ApplicantLanguage::create(array(
            'applicant_id' => 1,
            'language_id' => 2,
            'language_skill_id' => 2
        ));

        // Tester
        ApplicantLanguage::create(array(
            'applicant_id' => 2,
            'language_id' => 3,
            'language_skill_id' => 3
        ));

        // Tester
        ApplicantLanguage::create(array(
            'applicant_id' => 2,
            'language_id' => 1,
            'language_skill_id' => 3
        ));
    }

}
