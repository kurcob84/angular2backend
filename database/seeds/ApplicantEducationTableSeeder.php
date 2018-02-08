<?php

use Illuminate\Database\Seeder;
use App\ApplicantEducation;

class ApplicantEducationTableSeeder extends Seeder {

    public function run() {
        //DB::table('applicant_education')->delete();
        // Patrick
        ApplicantEducation::create(array(
            'applicant_id' => 1,
            'education_id' => 1
        ));

        // Tester
        ApplicantEducation::create(array(
            'applicant_id' => 2,
            'education_id' => 2
        ));

        // Patrick
        ApplicantEducation::create(array(
            'applicant_id' => 1,
            'education_id' => 3
        ));

        // Tester
        ApplicantEducation::create(array(
            'applicant_id' => 2,
            'education_id' => 4
        ));
    }

}
