<?php

use Illuminate\Database\Seeder;
use App\Experience;

class ExperienceTableSeeder extends Seeder {

    public function run() {
        //DB::table('experience')->delete();
        // Patrick
        Experience::create(array(
            'company' => "Trans4mation",
            'city' => "Dresden",
            'from' => "2015-02-01 21:00:55",
            'to' => "2018-02-01 21:00:55",
            'position' => "Teamleiter",
            'tasks' => "Zu viele"
        ));

        // Tester
        Experience::create(array(
            'company' => "Vufo",
            'city' => "Dresden",
            'from' => "2012-02-01 21:00:55",
            'to' => "2013-02-01 21:00:55",
            'position' => "Architekt",
            'tasks' => "Zu wenige"
        ));
    }

}
