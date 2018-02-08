<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run() {
        Model::unguard();

        $this->call('ApplicantTableSeeder');
        $this->command->info('Applicant table seeded!');

        $this->call('SkillTableSeeder');
        $this->command->info('Skill table seeded!');

        $this->call('ApplicantSkillOtherTableSeeder');
        $this->command->info('ApplicantSkillOther table seeded!');

        $this->call('ApplicantSkillTopTableSeeder');
        $this->command->info('ApplicantSkillTop table seeded!');

        $this->call('ExperienceTableSeeder');
        $this->command->info('Experience table seeded!');

        $this->call('ExperienceSkillTableSeeder');
        $this->command->info('ExperienceSkill table seeded!');

        $this->call('EducationTableSeeder');
        $this->command->info('Education table seeded!');

        $this->call('ApplicantEducationTableSeeder');
        $this->command->info('ApplicantEducation table seeded!');

        $this->call('ApplicantExperienceTableSeeder');
        $this->command->info('ApplicantExperience table seeded!');

        $this->call('JobroleTableSeeder');
        $this->command->info('Jobrole table seeded!');

        $this->call('ApplicantJobroleTableSeeder');
        $this->command->info('ApplicantJobrole table seeded!');

        $this->call('JobtypeTableSeeder');
        $this->command->info('Jobtype table seeded!');

        $this->call('ApplicantJobtypeTableSeeder');
        $this->command->info('ApplicantJobtype table seeded!');

        $this->call('CityTableSeeder');
        $this->command->info('City table seeded!');

        $this->call('ApplicantCityTableSeeder');
        $this->command->info('ApplicantCity table seeded!');

        $this->call('LanguageTableSeeder');
        $this->command->info('Language table seeded!');

        $this->call('LanguageSkillTableSeeder');
        $this->command->info('LanguageSkill table seeded!');

        $this->call('ApplicantLanguageTableSeeder');
        $this->command->info('ApplicantLanguage table seeded!');

        $this->call('MediaTableSeeder');
        $this->command->info('Media table seeded!');

        $this->call('ContentParentTableSeeder');
        $this->command->info('ContentParent table seeded!');

        $this->call('CompanyTableSeeder');
        $this->command->info('Company table seeded!');

        $this->call('BenefitTableSeeder');
        $this->command->info('Benefit table seeded!');

        $this->call('BenefitCompanyTableSeeder');
        $this->command->info('BenefitCompany table seeded!');

        $this->call('PositionTableSeeder');
        $this->command->info('Position table seeded!');

        $this->call('CompanyPositionTableSeeder');
        $this->command->info('CompanyPosition table seeded!');

        $this->call('JobTableSeeder');
        $this->command->info('Job table seeded!');

        $this->call('JobSkillTableSeeder');
        $this->command->info('JobSkill table seeded!');

        $this->call('JobJobtypeTableSeeder');
        $this->command->info('JobJobtype table seeded!');

        $this->call('CityJobTableSeeder');
        $this->command->info('CityJob table seeded!');

        $this->call('CityCompanyTableSeeder');
        $this->command->info('CityCompany table seeded!');

        $this->call('JobLanguageTableSeeder');
        $this->command->info('JobLanguage table seeded!');

        $this->call('AdminTableSeeder');
        $this->command->info('Admin table seeded!');

        $this->call('RoleTableSeeder');
        $this->command->info('Role table seeded!');
    }

}
