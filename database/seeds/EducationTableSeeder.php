<?php

use Illuminate\Database\Seeder;
use App\Models\Misc\Education;

class EducationTableSeeder extends Seeder {

    public function run() {
        //DB::table('education')->delete();
        // Patrick
        Education::create(array(
            'college' => "HTW Dresden",
            'subject' => "Medieninformatik",
            'degree' => "Diplom",
            'from' => "2006-02-01 21:00:55",
            'to' => "2011-02-01 21:00:55",
            'description' => "Sehr schönes Studium"
        ));

        // Tester
        Education::create(array(
            'college' => "HTWK Leipzig",
            'subject' => "Bibo",
            'degree' => "Bachelor",
            'from' => "2005-02-01 21:00:55",
            'to' => "2006-02-01 21:00:55",
            'description' => "stark"
        ));

        // Patrick
        Education::create(array(
            'college' => "Humbold Uni",
            'subject' => "Medizin",
            'degree' => "Dr.",
            'from' => "2007-02-01 21:00:55",
            'to' => "2009-02-01 21:00:55",
            'active' => 1,
            'description' => "Lasst mich durch ich bin Arzt"
        ));

        // Tester
        Education::create(array(
            'college' => "TU München",
            'subject' => "Maschinenbau",
            'degree' => "Dilpom",
            'from' => "2010-02-01 21:00:55",
            'to' => "2015-02-01 21:00:55",
            'description' => "furchbar"
        ));
    }

}
