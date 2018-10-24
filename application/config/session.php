<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

    'native' => array(
        'name' => 'fthm_web_session_prod',
        'lifetime' => 1000000,
    ),

   'cookie' => array(
	'name' => 'fthm3_web_prod',
        'encrypted' => TRUE,
        'lifetime' => 1000000,
    ),

/*
    'database' => array(
        'name' => 'cookie_name_prod',
        'encrypted' => TRUE,
        'lifetime' => 43200,
        'group' => 'default',
        'table' => 'table_name',
        'columns' => array(
            'session_id'  => 'session_id',
            'last_active' => 'last_active',
            'contents'    => 'contents'
        ),
        'gc' => 500,
    ),
*/
);
