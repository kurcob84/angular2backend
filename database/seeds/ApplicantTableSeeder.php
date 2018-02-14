<?php

use Illuminate\Database\Seeder;
use App\Models\Applicant\Applicant;

class ApplicantTableSeeder extends Seeder {

    public function run() {
        //DB::table('applicant')->delete();
        // Patrick Rogge
        Applicant::create(array(
            'email' => "patrick.rogge@t4m.de",
            'password' => "$2y$10\$X//XBbrtcu7oJib/1xivMOTZq4y72r2ct6GUyxIYWOb8rvNSIm6e.",
            'firstname' => "Patrick",
            'lastname' => "Rogge",
            'birthday' => "1984-02-01 21:00:55",
            'city' => "Dresden",
            'description' => "Ich bin nett",
            'telephone' => "017612345678",
            'github' => "https://github.com/kurcob84",
            'skype' => "skype.com",
            'salary' => "2000",
            'periodofnotice' => "Test",
            'linkedin' => "linkedin.de",
            'xing' => "xing.de/patrick",
            'role_id' => 2,
            'picture_id' => 1
        ));

        // Test Tester
        Applicant::create(array(
            'email' => "test@tester.com",
            'password' => "$2y$10\$X//XBbrtcu7oJib/1xivMOTZq4y72r2ct6GUyxIYWOb8rvNSIm6e.",
            'firstname' => "Test",
            'lastname' => "Tester",
            'birthday' => "1980-02-01 21:00:55",
            'city' => "Berlin",
            'description' => "Ich will arbeiten",
            'telephone' => "384/r543r43",
            'skype' => "skype.de/tester",
            'salary' => "1000",
            'periodofnotice' => "fdafds",
            'github' => "github.de/tester",
            'linkedin' => "linkedin.de/tester",
            'xing' => "xing.de/tester",
            'role_id' => 2,
            'picture_id' => 2
        ));
    }

}
