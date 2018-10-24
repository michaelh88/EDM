<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2018-10-19 07:40:50 --- CRITICAL: Database_Exception [ 2 ]: mysqli_connect(): (HY000/2002): Aucune connexion n�a pu �tre �tablie car l�ordinateur cible l�a express�ment refus�e.
 ~ MODPATH\mysqli\classes\Database\MySQLi.php [ 61 ] in C:\xampp\htdocs\ged\modules\mysqli\classes\Database\MySQLi.php:160
2018-10-19 07:40:50 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\mysqli\classes\Database\MySQLi.php(160): Database_MySQLi->connect()
#1 C:\xampp\htdocs\ged\modules\mysqli\classes\Database\MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1668): Database_MySQLi->list_columns('`users`')
#3 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#4 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#5 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#6 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(Array)
#7 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(19): Kohana_ORM::factory('Model_User', Array)
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#11 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\ged\modules\mysqli\classes\Database\MySQLi.php:160
2018-10-19 07:44:59 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-19 07:44:59 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1475): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1475, Array)
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
2018-10-19 08:51:49 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-19 08:51:49 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1475): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1475, Array)
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
2018-10-19 08:52:47 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1475
2018-10-19 08:52:47 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1475): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1475, Array)
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
2018-10-19 08:55:56 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 08:55:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 10:28:42 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:28:42 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:29:17 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:29:17 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:29:39 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:29:39 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:29:49 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:29:49 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:30:23 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:30:23 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:30:42 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:30:42 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:31:01 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:31:01 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:31:38 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:31:38 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:32:22 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:32:22 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:32:39 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1480 ] in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:32:39 --- DEBUG: #0 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php(1480): Kohana_Core::error_handler(2, 'count(): Parame...', 'C:\\xampp\\htdocs...', 1480, Array)
#1 C:\xampp\htdocs\ged\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#2 C:\xampp\htdocs\ged\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '75dfb3f2103a00f...', false)
#3 C:\xampp\htdocs\ged\application\classes\Controller\Session.php(22): Kohana_Auth->login('orandrianasolos...', 'oliviaran2015')
#4 C:\xampp\htdocs\ged\system\classes\Kohana\Controller.php(84): Controller_Session->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#7 C:\xampp\htdocs\ged\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\ged\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\ged\index.php(120): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\ged\modules\orm\classes\Kohana\ORM.php:1480
2018-10-19 10:38:43 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 10:38:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 11:03:37 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 11:03:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 13:58:40 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 13:58:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:25:15 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 14:25:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:36:25 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 14:36:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:36:26 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 14:36:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:46:32 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 14:46:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:47:03 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 14:47:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:47:07 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 14:47:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:47:46 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 14:47:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:48:24 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 14:48:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:48:35 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 14:48:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:49:01 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 14:49:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 14:53:05 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 14:53:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:15:41 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:15:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:16:05 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:16:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:16:35 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:16:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:16:39 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:16:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:16:54 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:16:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:16:59 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:16:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:17:25 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:17:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:17:49 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:17:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:18:13 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:18:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:18:55 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:18:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:19:21 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::_handler() must be an instance of Exception, instance of ParseError given, called in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php on line 86 and defined in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:102
Stack trace:
#0 C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php(86): Kohana_Kohana_Exception::_handler(Object(ParseError))
#1 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#2 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 102 ] in file:line
2018-10-19 15:19:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:22:35 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 15:22:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:30:39 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 15:30:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:40:31 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 15:40:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:53:55 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 15:53:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:55:00 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 15:55:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:55:04 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 15:55:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:56:11 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 15:56:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 15:56:33 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 15:56:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 16:13:31 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2018-10-19 16:13:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2018-10-19 16:24:27 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in C:\xampp\htdocs\ged\system\classes\Kohana\Kohana\Exception.php:87
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 87 ] in file:line
2018-10-19 16:24:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line