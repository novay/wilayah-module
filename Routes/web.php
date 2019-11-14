<?php

/* 
 * Author : Noviyanto Rahmadi 
 * E-mail : me@novay.web.id
 * Copyright 2018 Borneo Teknomedia 
 */

$router->group(
    [
        'prefix' => config('wilayah.module.route.prefix'),
        'as' => 'wilayah::',
        'middleware' => config('wilayah.module.route.middleware'),
    ],
    function ($router) {
    	$router->get('/', 'WilayahController@index');
        $router->resource('provinsi', 'ProvinsiController');
        $router->resource('kabupaten', 'KabupatenController');
        $router->resource('kecamatan', 'KecamatanController');
        $router->resource('kelurahan', 'KelurahanController');
    }
);