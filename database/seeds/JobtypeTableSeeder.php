<?php

use Illuminate\Database\Seeder;
use App\Jobtype;

class JobtypeTableSeeder extends Seeder {

    public function run() {
        //DB::table('jobtype')->delete();
        // Festanstellung
        Jobtype::create(array(
            'name' => "Festanstellung"
        ));

        // Freelancer
        Jobtype::create(array(
            'name' => "Freelancer"
        ));

        // Remote
        Jobtype::create(array(
            'name' => "Remote"
        ));
    }

}
