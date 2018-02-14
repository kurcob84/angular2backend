<?php

use Illuminate\Database\Seeder;
use App\Models\Company\CityCompany;

class CityCompanyTableSeeder extends Seeder {

    public function run() {
        //DB::table('city_company')->delete();
        // Trans4mation
        CityCompany::create(array(
            'company_id' => 1,
            'city_id' => 1
        ));

        // Trans4mation
        CityCompany::create(array(
            'company_id' => 1,
            'city_id' => 2
        ));

        // Telekom
        CityCompany::create(array(
            'company_id' => 2,
            'city_id' => 3
        ));

        // Telekom
        CityCompany::create(array(
            'company_id' => 2,
            'city_id' => 4
        ));
    }

}
