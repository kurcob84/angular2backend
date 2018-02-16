<?php

Auth::routes();

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {   

    // Auth
    //, 'middleware' => 'mwm.needsRole:USER', 'middleware' => ['web']
    $api->group(['prefix' => 'auth' ], function($api) {
        
        ##############################
        ######## Auth
        ##############################
        $api->group(['prefix' => 'admin'], function($api) {
            $api->post('login',             'App\Http\Controllers\Applicant\ApplicantController@create');
            $api->post('logout',            'App\Http\Controllers\Applicant\ApplicantController@create');
        });
        $api->group(['prefix' => 'applicant'], function($api) {
            $api->post('login',             'App\Http\Controllers\Applicant\ApplicantController@create');
            $api->post('logout',            'App\Http\Controllers\Applicant\ApplicantController@create');
            $api->post('register',          'App\Http\Controllers\Applicant\ApplicantController@create');
        });
        $api->group(['prefix' => 'company'], function($api) {
            $api->post('login',             'App\Http\Controllers\Applicant\ApplicantController@create');
            $api->post('logout',            'App\Http\Controllers\Applicant\ApplicantController@create');
            $api->post('register',          'App\Http\Controllers\Applicant\ApplicantController@create');
        });

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
        $api->delete('city',                'App\Http\Controllers\Misc\CityController@destroy');
        $api->put('city',                   'App\Http\Controllers\Misc\CityController@update');
    
        //Benefit
        $api->post('benefit',               'App\Http\Controllers\Misc\BenefitController@create');
        $api->get('benefit',                'App\Http\Controllers\Misc\BenefitController@index');
        $api->delete('benefit',             'App\Http\Controllers\Misc\BenefitController@destroy');
        $api->put('benefit',                'App\Http\Controllers\Misc\BenefitController@update');
        
        //Language
        $api->post('language',              'App\Http\Controllers\Misc\LanguageController@create');
        $api->get('language',               'App\Http\Controllers\Misc\LanguageController@index');
        $api->delete('language',            'App\Http\Controllers\Misc\LanguageController@destroy');
        $api->put('language',               'App\Http\Controllers\Misc\LanguageController@update');
        
        //Position
        $api->post('position',              'App\Http\Controllers\Misc\PositionController@create');
        $api->get('position',               'App\Http\Controllers\Misc\PositionController@index');
        $api->delete('position',            'App\Http\Controllers\Misc\PositionController@destroy');
        $api->put('position',               'App\Http\Controllers\Misc\PositionController@update');
        
        //Skill
        $api->post('skill',                 'App\Http\Controllers\Misc\SkillController@create');
        $api->get('skill',                  'App\Http\Controllers\Misc\SkillController@index');
        $api->delete('skill',               'App\Http\Controllers\Misc\SkillController@destroy');
        $api->put('skill',                  'App\Http\Controllers\Misc\SkillController@update');
        
    });
    
    // Public
    $api->group(['prefix' => 'public'], function($api) {
//        $api->get('city', 'App\Http\Controllers\CityController@index');
    });
});