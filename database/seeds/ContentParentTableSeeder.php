<?php

use Illuminate\Database\Seeder;
use App\ContentParent;

class ContentParentTableSeeder extends Seeder {

    public function run() {
        //DB::table('content_parent')->delete();
        // APPLICANT
        ContentParent::create(array(
            'name' => "APPLICANT"
        ));

        // COMPANY
        ContentParent::create(array(
            'name' => "COMPANY"
        ));
    }

}
