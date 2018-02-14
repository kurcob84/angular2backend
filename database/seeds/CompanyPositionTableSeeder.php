<?php

use Illuminate\Database\Seeder;
use App\Models\Company\CompanyPosition;

class CompanyPositionTableSeeder extends Seeder {

    public function run() {
        //DB::table('company_position')->delete();
        // Trans4mation
        CompanyPosition::create(array(
            'company_id' => 1,
            'position_id' => 1
        ));

        // Trans4mation
        CompanyPosition::create(array(
            'company_id' => 1,
            'position_id' => 2
        ));

        // Telekom
        CompanyPosition::create(array(
            'company_id' => 2,
            'position_id' => 3
        ));

        // Telekom
        CompanyPosition::create(array(
            'company_id' => 2,
            'position_id' => 4
        ));
    }

}
