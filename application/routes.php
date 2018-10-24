<?php defined('SYSPATH') or die('No direct script access.');

Route::set('default', '(<controller>(/<action>(/<id>)))')
        ->defaults(array(
           'controller' => 'Session',
           'action'     => 'Login',
        ));

/** 
 * Error router
 */
Route::set('error', 'error/<action>/<origuri>/<message>', array('action' => '[0-9]++', 'origuri' => '.+', 'message' => '.+'))
	->defaults(array(
	    'controller' => 'Error',
	    'action'     => 'Index'
	));
