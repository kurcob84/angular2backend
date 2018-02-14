<?php

use Illuminate\Database\Seeder;
use App\Models\Applicant\ApplicantJobrole;

class ApplicantJobroleTableSeeder extends Seeder {

    public function run() {
        //DB::table('applicant_jobrole')->delete();
        // Patrick
        ApplicantJobrole::create(array(
            'applicant_id' => 1,
            'jobrole_id' => 1
        ));

        // Patrick
        ApplicantJobrole::create(array(
            'applicant_id' => 1,
            'jobrole_id' => 6
        ));

        // Tester
        ApplicantJobrole::create(array(
            'applicant_id' => 2,
            'jobrole_id' => 2
        ));

        // Tester
        ApplicantJobrole::create(array(
            'applicant_id' => 2,
            'jobrole_id' => 4
        ));
    }

}
