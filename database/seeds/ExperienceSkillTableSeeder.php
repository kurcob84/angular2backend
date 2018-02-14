<?php

use Illuminate\Database\Seeder;
use App\Models\Misc\ExperienceSkill;

class ExperienceSkillTableSeeder extends Seeder {

    public function run() {
        //DB::table('experience_skill')->delete();
        // Patrick Rogge
        ExperienceSkill::create(array(
            'experience_id' => 1,
            'skill_id' => 4
        ));

        // Patrick Rogge
        ExperienceSkill::create(array(
            'experience_id' => 1,
            'skill_id' => 2
        ));

        // Test Tester
        ExperienceSkill::create(array(
            'experience_id' => 2,
            'skill_id' => 3
        ));

        // Test Tester
        ExperienceSkill::create(array(
            'experience_id' => 2,
            'skill_id' => 5
        ));
    }

}
