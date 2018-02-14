<?php

use Illuminate\Database\Seeder;
use App\Models\Misc\LanguageSkill;

class LanguageSkillTableSeeder extends Seeder {

    public function run() {
        //DB::table('language_skill')->delete();
        // Keine Kenntnisse
        LanguageSkill::create(array(
            'name' => "Keine Kenntnisse"
        ));

        // Grundkenntnisse
        LanguageSkill::create(array(
            'name' => "Grundkenntnisse"
        ));

        // Fortgeschritten
        LanguageSkill::create(array(
            'name' => "Fortgeschritten"
        ));

        // Verhandlungssicher
        LanguageSkill::create(array(
            'name' => "Verhandlungssicher"
        ));

        // Muttersprachlich
        LanguageSkill::create(array(
            'name' => "Muttersprachlich"
        ));
    }

}
