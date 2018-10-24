<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2018-10-18 09:00:23 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:00:23 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1475): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1475, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:29:40 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:29:40 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1475): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1475, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '3c9374e5170ecce...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'olivaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:31:06 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:31:06 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1475): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1475, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '3c9374e5170ecce...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'olivaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:31:24 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:31:24 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1475): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1475, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:31:47 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:31:47 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1475): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1475, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:32:02 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-18 09:32:02 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1475): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1475, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475