<?php

use App\Http\Controllers;


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    
    $api->group(['middleware' => 'foo'], function ($api) {
        
        $api->get('city', 'App\Http\Controllers\CityController@index');
        $api->put('city', 'App\Http\Controllers\CityController@create');
    });
});