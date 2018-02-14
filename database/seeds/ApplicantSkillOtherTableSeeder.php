<?php

use Illuminate\Database\Seeder;
use App\Models\Applicant\ApplicantSkillOther;

class ApplicantSkillOtherTableSeeder extends Seeder {

    public function run() {
        //DB::table('applicant_skill_other')->delete();
        // Patrick
        ApplicantSkillOther::create(array(
            'applicant_id' => 1,
            'skill_id' => 1
        ));

        // Patrick
        ApplicantSkillOther::create(array(
            'applicant_id' => 1,
            'skill_id' => 2
        ));

        // Patrick
        ApplicantSkillOther::create(array(
            'applicant_id' => 1,
            'skill_id' => 5
        ));

        // Tester
        ApplicantSkillOther::create(array(
            'applicant_id' => 2,
            'skill_id' => 4
        ));

        // Tester
        ApplicantSkillOther::create(array(
            'applicant_id' => 2,
            'skill_id' => 1
        ));
    }

}
