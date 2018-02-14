<?php

use Illuminate\Database\Seeder;
use App\Models\Misc\Skill;

class SkillTableSeeder extends Seeder {

    public function run() {
        //DB::table('skill')->delete();
        // PHP5
        Skill::create(array(
            'name' => "PHP5"
        ));

        // HTML5
        Skill::create(array(
            'name' => "HTML5"
        ));

        // JavaScript
        Skill::create(array(
            'name' => "JavaScript"
        ));

        // AngularJS
        Skill::create(array(
            'name' => "AngularJS"
        ));

        // CSS3
        Skill::create(array(
            'name' => "CSS3"
        ));

        // jQuery
        Skill::create(array(
            'name' => "jQuery"
        ));
    }

}
