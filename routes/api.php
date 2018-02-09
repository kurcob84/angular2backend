<?php

Auth::routes();

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {   

    // Auth
    //, 'middleware' => 'mwm.needsRole:USER', 'middleware' => ['web']
    $api->group(['prefix' => 'auth' ], function($api) {
        $api->put('city', 'App\Http\Controllers\CityController@create');
    });
    
    // Public
    $api->group(['prefix' => 'public'], function($api) {
        $api->get('city', 'App\Http\Controllers\CityController@index');
    });
});