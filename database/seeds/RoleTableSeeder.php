<?php

use Illuminate\Database\Seeder;
use App\Models\Misc\Role;

class RoleTableSeeder extends Seeder {

    public function run() {
        //DB::table('role')->delete();
        // Admin
        Role::create(array(
            'name' => "Admin",
            'slug' => "ADMIN"
        ));

        // Applicant
        Role::create(array(
            'name' => "Applicant",
            'slug' => "APPLICANT"
        ));

        // Company
        Role::create(array(
            'name' => "Company",
            'slug' => "COMPANY"
        ));
    }

}
