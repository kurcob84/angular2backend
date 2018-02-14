<?php

use Illuminate\Database\Seeder;
use App\Models\Misc\Position;

class PositionTableSeeder extends Seeder {

    public function run() {
        //DB::table('position')->delete();
        // Solution Consultants
        Position::create(array(
            'name' => "Solution Consultants"
        ));

        // Solution Engineers
        Position::create(array(
            'name' => "Solution Engineers"
        ));

        // Technical Support Engineers
        Position::create(array(
            'name' => "Technical Support Engineers"
        ));

        // Developer
        Position::create(array(
            'name' => "Developer"
        ));
    }

}
