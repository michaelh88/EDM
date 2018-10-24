<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2018-06-04 07:22:18 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (08004/1040): Too many connections ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 07:22:18 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
#1 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('users')
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#6 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(Array)
#7 /home/fthmgedcbc/www/application/classes/Controller/Session.php(19): Kohana_ORM::factory('User', Array)
#8 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Session->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#14 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 07:22:29 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (08004/1040): Too many connections ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 07:22:29 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
#1 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('users')
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#6 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(Array)
#7 /home/fthmgedcbc/www/application/classes/Controller/Session.php(19): Kohana_ORM::factory('User', Array)
#8 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Session->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#14 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 07:22:56 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (08004/1040): Too many connections ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 07:22:56 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
#1 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('users')
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#6 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(Array)
#7 /home/fthmgedcbc/www/application/classes/Controller/Session.php(19): Kohana_ORM::factory('User', Array)
#8 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Session->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#14 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 07:23:58 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (08004/1040): Too many connections ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 07:23:58 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
#1 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('users')
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#6 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(Array)
#7 /home/fthmgedcbc/www/application/classes/Controller/Session.php(19): Kohana_ORM::factory('User', Array)
#8 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Session->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#14 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 08:04:15 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (08004/1040): Too many connections ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 08:04:15 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
#1 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('users')
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#6 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(Array)
#7 /home/fthmgedcbc/www/application/classes/Controller/Session.php(19): Kohana_ORM::factory('User', Array)
#8 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Session->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#14 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 08:04:50 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (08004/1040): Too many connections ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 08:04:50 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
#1 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('users')
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#6 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(Array)
#7 /home/fthmgedcbc/www/application/classes/Controller/Session.php(19): Kohana_ORM::factory('User', Array)
#8 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Session->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#14 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 08:09:17 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (08004/1040): Too many connections ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 08:09:17 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
#1 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('users')
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#6 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(Array)
#7 /home/fthmgedcbc/www/application/classes/Controller/Session.php(19): Kohana_ORM::factory('User', Array)
#8 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Session->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#14 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 08:09:25 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (08004/1040): Too many connections ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 08:09:25 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
#1 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('users')
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#6 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(Array)
#7 /home/fthmgedcbc/www/application/classes/Controller/Session.php(19): Kohana_ORM::factory('User', Array)
#8 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Session->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Session))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#14 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2018-06-04 09:51:14 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13710] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:01:34 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13711] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:06:05 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13712] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:09:44 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13713] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:13:54 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13714] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:21:36 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13715] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:25:44 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13716] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:29:17 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13717] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:32:02 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13718] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:35:43 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13719] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2018-06-04 10:40:48 --- INFO: [Utilisateur : CLIENT_GED01] [Action : Création du lot 13720] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84