<?php

use Illuminate\Database\Seeder;
use App\Models\Job\JobSkill;

class JobSkillTableSeeder extends Seeder {

    public function run() {
        //DB::table('job_skill')->delete();
        // Teamleiter gesucht
        JobSkill::create(array(
            'job_id' => 1,
            'skill_id' => 1
        ));

        // Teamleiter gesucht
        JobSkill::create(array(
            'job_id' => 1,
            'skill_id' => 2
        ));

        // Entwickler gesucht
        JobSkill::create(array(
            'job_id' => 2,
            'skill_id' => 3
        ));

        // Entwickler gesucht
        JobSkill::create(array(
            'job_id' => 2,
            'skill_id' => 1
        ));
    }

}
