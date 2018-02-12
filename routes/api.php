<?php

Auth::routes();

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {   

    // Auth
    //, 'middleware' => 'mwm.needsRole:USER', 'middleware' => ['web']
    $api->group(['prefix' => 'auth' ], function($api) {
        
        ##############################
        ######## Applicant
        ##############################
        
        //Applicant
        $api->post('applicant',             'App\Http\Controllers\Applicant\ApplicantController@create');
        $api->get('applicant',              'App\Http\Controllers\Applicant\ApplicantController@index');
        $api->get('applicant/{id}',         'App\Http\Controllers\Applicant\ApplicantController@show');
        $api->delete('applicant/{id}',      'App\Http\Controllers\Applicant\ApplicantController@destroy');
        $api->put('applicant/{id}',         'App\Http\Controllers\Applicant\ApplicantController@update');
        
        //Application Job
        $api->post('applicant',             'App\Http\Controllers\Applicant\ApplicationJobController@create');
        $api->get('applicant',              'App\Http\Controllers\Applicant\ApplicationJobController@index');
        $api->get('applicant/{id}',         'App\Http\Controllers\Applicant\ApplicationJobController@show');
        $api->delete('applicant/{id}',      'App\Http\Controllers\Applicant\ApplicationJobController@destroy');
        $api->put('applicant/{id}',         'App\Http\Controllers\Applicant\ApplicationJobController@update');
        
        ##############################
        ######## Company
        ##############################
        
        //Company
        $api->post('company',               'App\Http\Controllers\Company\CompanyController@create');
        $api->get('company',                'App\Http\Controllers\Company\CompanyController@index');
        $api->get('company/{id}',           'App\Http\Controllers\Company\CompanyController@show');
        $api->delete('company/{id}',        'App\Http\Controllers\Company\CompanyController@destroy');
        $api->put('company/{id}',           'App\Http\Controllers\Company\CompanyController@update');
 
        ##############################
        ######## Job
        ##############################
        
        //Job
        $api->post('job',                   'App\Http\Controllers\Job\JobController@create');
        $api->get('job',                    'App\Http\Controllers\Job\JobController@index');
        $api->get('job/{id}',               'App\Http\Controllers\Job\JobController@show');
        $api->delete('job/{id}',            'App\Http\Controllers\Job\JobController@destroy');
        $api->put('job/{id}',               'App\Http\Controllers\Job\JobController@update');
        
        //Jobrole
        $api->post('jobrole',               'App\Http\Controllers\Job\JobroleController@create');
        $api->get('jobrole',                'App\Http\Controllers\Job\JobroleController@index');
        $api->get('jobrole/{id}',           'App\Http\Controllers\Job\JobroleController@show');
        $api->delete('jobrole/{id}',        'App\Http\Controllers\Job\JobroleController@destroy');
        $api->put('jobrole/{id}',           'App\Http\Controllers\Job\JobroleController@update');
        
        //Jobtype
        $api->post('jobtype',               'App\Http\Controllers\Job\JobtypeController@create');
        $api->get('jobtype',                'App\Http\Controllers\Job\JobtypeController@index');
        $api->get('jobtype/{id}',           'App\Http\Controllers\Job\JobtypeController@show');
        $api->delete('jobtype/{id}',        'App\Http\Controllers\Job\JobtypeController@destroy');
        $api->put('jobtype/{id}',           'App\Http\Controllers\Job\JobtypeController@update');
        
        ##############################
        ######## MISC
        ##############################
        
        //City
        $api->post('city',                  'App\Http\Controllers\Misc\CityController@create');
        $api->get('city',                   'App\Http\Controllers\Misc\CityController@index');
        $api->get('city/{id}',              'App\Http\Controllers\Misc\CityController@show');
        $api->delete('city/{id}',           'App\Http\Controllers\Misc\CityController@destroy');
        $api->put('city/{id}',              'App\Http\Controllers\Misc\CityController@update');
    
        //Benefit
        $api->post('benefit',               'App\Http\Controllers\Misc\BenefitController@create');
        $api->get('benefit',                'App\Http\Controllers\Misc\BenefitController@index');
        $api->get('benefit/{id}',           'App\Http\Controllers\Misc\BenefitController@show');
        $api->delete('benefit/{id}',        'App\Http\Controllers\Misc\BenefitController@destroy');
        $api->put('benefit/{id}',           'App\Http\Controllers\Misc\BenefitController@update');
    
        //Education
        $api->post('education',             'App\Http\Controllers\Misc\EducationController@create');
        $api->get('education',              'App\Http\Controllers\Misc\EducationController@index');
        $api->get('education/{id}',         'App\Http\Controllers\Misc\EducationController@show');
        $api->delete('education/{id}',      'App\Http\Controllers\Misc\EducationController@destroy');
        $api->put('education/{id}',         'App\Http\Controllers\Misc\EducationController@update');
        
        
        //Experience
        $api->post('experience',            'App\Http\Controllers\Misc\ExperienceController@create');
        $api->get('experience',             'App\Http\Controllers\Misc\ExperienceController@index');
        $api->get('experience/{id}',        'App\Http\Controllers\Misc\ExperienceController@show');
        $api->delete('experience/{id}',     'App\Http\Controllers\Misc\ExperienceController@destroy');
        $api->put('experience/{id}',        'App\Http\Controllers\Misc\ExperienceController@update');
        
        //Language
        $api->post('language',              'App\Http\Controllers\Misc\LanguageController@create');
        $api->get('language',               'App\Http\Controllers\Misc\LanguageController@index');
        $api->get('language/{id}',          'App\Http\Controllers\Misc\LanguageController@show');
        $api->delete('language/{id}',       'App\Http\Controllers\Misc\LanguageController@destroy');
        $api->put('language/{id}',          'App\Http\Controllers\Misc\LanguageController@update');
        
        //Position
        $api->post('position',              'App\Http\Controllers\Misc\PositionController@create');
        $api->get('position',               'App\Http\Controllers\Misc\PositionController@index');
        $api->get('position/{id}',          'App\Http\Controllers\Misc\PositionController@show');
        $api->delete('position/{id}',       'App\Http\Controllers\Misc\PositionController@destroy');
        $api->put('position/{id}',          'App\Http\Controllers\Misc\PositionController@update');
        
        //Skill
        $api->post('skill',                 'App\Http\Controllers\Misc\SkillController@create');
        $api->get('skill',                  'App\Http\Controllers\Misc\SkillController@index');
        $api->get('skill/{id}',             'App\Http\Controllers\Misc\SkillController@show');
        $api->delete('skill/{id}',          'App\Http\Controllers\Misc\SkillController@destroy');
        $api->put('skill/{id}',             'App\Http\Controllers\Misc\SkillController@update');
        
    });
    
    // Public
    $api->group(['prefix' => 'public'], function($api) {
//        $api->get('city', 'App\Http\Controllers\CityController@index');
    });
});