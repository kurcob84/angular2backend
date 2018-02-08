<?php

use Illuminate\Database\Seeder;
use App\Jobrole;

class JobroleTableSeeder extends Seeder {

    public function run() {
        //DB::table('jobrole')->delete();
        // Software Entwickler
        Jobrole::create(array(
            'name' => "Software Entwickler"
        ));

        // Fullstack Entwickler
        Jobrole::create(array(
            'name' => "Fullstack Entwickler"
        ));

        // Backend Entwickler
        Jobrole::create(array(
            'name' => "Backend Entwickler"
        ));

        // Frontend Entwickler
        Jobrole::create(array(
            'name' => "Frontend Entwickler"
        ));

        // Mobile Entwickler
        Jobrole::create(array(
            'name' => "Mobile Entwickler"
        ));

        // IT Architekt
        Jobrole::create(array(
            'name' => "IT Architekt"
        ));

        // Data Scientist
        Jobrole::create(array(
            'name' => "Data Scientist"
        ));

        // Systemadministration
        Jobrole::create(array(
            'name' => "Systemadministration"
        ));

        // DevOps
        Jobrole::create(array(
            'name' => "DevOps"
        ));

        // Qualitätssicherung
        Jobrole::create(array(
            'name' => "Qualitätssicherung"
        ));

        // Teamleiter
        Jobrole::create(array(
            'name' => "Teamleiter"
        ));

        // Projektmanager
        Jobrole::create(array(
            'name' => "Projektmanager"
        ));

        // Produktmanager
        Jobrole::create(array(
            'name' => "Produktmanager"
        ));

        // Scrum Master
        Jobrole::create(array(
            'name' => "Scrum Master"
        ));

        // Technical Consultant
        Jobrole::create(array(
            'name' => "Technical Consultant"
        ));

        // SAP Berater
        Jobrole::create(array(
            'name' => "SAP Berater"
        ));

        // UX/UI Designer
        Jobrole::create(array(
            'name' => "UX/UI Designer"
        ));

        // Business Intelligence
        Jobrole::create(array(
            'name' => "Business Intelligence"
        ));

        // CTO/CIO (Entwicklungsleiter)
        Jobrole::create(array(
            'name' => "CTO/CIO (Entwicklungsleiter)"
        ));
    }

}
