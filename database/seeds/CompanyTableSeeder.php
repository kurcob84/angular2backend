<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder {

    public function run() {
        //DB::table('company')->delete();
        // Trans4mation
        Company::create(array(
            'email' => "patrick.rogge@trans4mation.de",
            'password' => "$2y$10\$X//XBbrtcu7oJib/1xivMOTZq4y72r2ct6GUyxIYWOb8rvNSIm6e.",
            'name' => "Trans4mation",
            'about_us' => "Wir sind ein aufstrebens Unternehmen",
            'founding' => "TestText",
            'size' => "200",
            'xing' => "https://www.xing.com/companies/trans4mationitgmbh",
            'website' => "www.trans4mation.de",
            'linkedin' => "https://de.linkedin.com/company/trans4mation-it-gmbh",
            'youtube' => "https://www.youtube.com/channel/UC-kt4i2ymMbOsNSoN5HgI_Q",
            'twitter' => "https://twitter.com/trans4mationit?lang=de",
            'telephone' => "035112345678",
            'role_id' => 3,
            'picture_id' => 3
        ));

        // Telekom
        Company::create(array(
            'email' => "telekom@test.de",
            'password' => "$2y$10\$X//XBbrtcu7oJib/1xivMOTZq4y72r2ct6GUyxIYWOb8rvNSIm6e.",
            'name' => "Telekom",
            'about_us' => "Wir sind die größten",
            'founding' => "Wird immer besser",
            'size' => "2000",
            'xing' => "xing.de/telekom",
            'website' => "telekom.de",
            'linkedin' => "linkedin.de/telekom",
            'youtube' => "youtube.com/telekom",
            'twitter' => "twitter.com/telekom",
            'telephone' => "044/423543543",
            'role_id' => 3,
            'picture_id' => 4
        ));
    }

}
