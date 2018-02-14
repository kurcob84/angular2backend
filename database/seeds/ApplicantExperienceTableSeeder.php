<?php

use Illuminate\Database\Seeder;
use App\Models\Applicant\ApplicantExperience;

class ApplicantExperienceTableSeeder extends Seeder {

    public function run() {
        //DB::table('applicant_experience')->delete();
        // Patrick
        ApplicantExperience::create(array(
            'applicant_id' => 1,
            'experience_id' => 1
        ));

        // Tester
        ApplicantExperience::create(array(
            'applicant_id' => 2,
            'experience_id' => 2
        ));
    }

}
