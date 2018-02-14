<?php

use Illuminate\Database\Seeder;
use App\Models\Applicant\ApplicantSkillTop;

class ApplicantSkillTopTableSeeder extends Seeder {

    public function run() {
        //DB::table('applicant_skill_top')->delete();
        // Patrick
        ApplicantSkillTop::create(array(
            'applicant_id' => 1,
            'skill_id' => 3
        ));

        // Patrick
        ApplicantSkillTop::create(array(
            'applicant_id' => 1,
            'skill_id' => 4
        ));

        // Test Tester
        ApplicantSkillTop::create(array(
            'applicant_id' => 2,
            'skill_id' => 3
        ));

        // Test Tester
        ApplicantSkillTop::create(array(
            'applicant_id' => 2,
            'skill_id' => 5
        ));
    }

}
