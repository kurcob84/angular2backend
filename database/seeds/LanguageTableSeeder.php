<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguageTableSeeder extends Seeder {

    public function run() {
        //DB::table('language')->delete();
        // Deutsch
        Language::create(array(
            'name' => "Deutsch"
        ));

        // Englisch
        Language::create(array(
            'name' => "Englisch"
        ));

        // Spanisch
        Language::create(array(
            'name' => "Spanisch"
        ));

        // Französisch
        Language::create(array(
            'name' => "Französisch"
        ));
    }

}
