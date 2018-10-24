<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	'driver'       => 'ORM',
	'hash_method'  => 'sha256',
	'hash_key'     => 'qsdlqsmldkmqlskd9898098098qplsdkqmsldkmqlskdmlsqd098098',
	'lifetime'     => 10000000,
	'session_key'  => 'auth_user',
	'session_type' => Session::$default,

	// Username/password combinations for the Auth File driver
	'users' => array(
		'admin' => 'b3154acf3a344170077d11bdb5fff31532f679a1919e716a02',
	),

);
