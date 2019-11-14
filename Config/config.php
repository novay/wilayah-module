<?php

return [
    'name' => 'Wilayah', 
    'version' => '1.0', 

    'module' => [

        'table_prefix' => 'wil_',

        'route' => [
	        'enabled' => false,
	        'middleware' => ['web'],
	        'prefix' => 'wilayah',
	    ],

	    'view' => [
	        'layout' => 'ui::layouts.app',
	    ],

	    'menu' => [
	        'enabled' => false,
	    ],
    ],
];
