<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder {

    public function run() {
        //DB::table('admin')->delete();
        // Admin
        Admin::create(array(
            'email' => "roggepatrick@googlemail.com",
            'password' => "$2y$10\$X//XBbrtcu7oJib/1xivMOTZq4y72r2ct6GUyxIYWOb8rvNSIm6e.",
            'firstname' => "Admin",
            'lastname' => "Admin",
            'role_id' => 1
        ));
    }

}
