<?php

use Illuminate\Database\Seeder;
use App\Models\Company\BenefitCompany;

class BenefitCompanyTableSeeder extends Seeder {

    public function run() {
        //DB::table('benefit_company')->delete();
        // Trans4mation
        BenefitCompany::create(array(
            'company_id' => 1,
            'benefit_id' => 1
        ));

        // Trans4mation
        BenefitCompany::create(array(
            'company_id' => 1,
            'benefit_id' => 2
        ));

        // Telekom
        BenefitCompany::create(array(
            'company_id' => 2,
            'benefit_id' => 3
        ));

        // Telekom
        BenefitCompany::create(array(
            'company_id' => 2,
            'benefit_id' => 4
        ));
    }

}
