<?php

use Illuminate\Database\Seeder;
use App\Models\Applicant\ApplicantJobtype;

class ApplicantJobtypeTableSeeder extends Seeder {

    public function run() {
        //DB::table('applicant_jobtype')->delete();
        // Patrick
        ApplicantJobtype::create(array(
            'applicant_id' => 1,
            'jobtype_id' => 1
        ));

        // Patrick
        ApplicantJobtype::create(array(
            'applicant_id' => 1,
            'jobtype_id' => 2
        ));

        // Tester
        ApplicantJobtype::create(array(
            'applicant_id' => 2,
            'jobtype_id' => 3
        ));

        // Tester
        ApplicantJobtype::create(array(
            'applicant_id' => 2,
            'jobtype_id' => 3
        ));
    }

}
