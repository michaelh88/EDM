<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-10-19 08:14:36 --- EMERGENCY: Database_Exception [ 2006 ]: MySQL server has gone away [ SHOW FULL COLUMNS FROM `lot` ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 08:14:36 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('lot')
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(NULL)
#6 /home/fthmgedcbc/www/application/classes/Controller/Import.php(170): Kohana_ORM::factory('Lot')
#7 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Import->action_ajax_plupload()
#8 [internal function]: Kohana_Controller->execute()
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Import))
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 /home/fthmgedcbc/www/index.php(118): Kohana_Request->execute()
#13 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 10:08:47 --- EMERGENCY: Database_Exception [ 2006 ]: MySQL server has gone away [ SHOW FULL COLUMNS FROM `lot` ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 10:08:47 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('lot')
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(NULL)
#6 /home/fthmgedcbc/www/application/classes/Controller/Import.php(170): Kohana_ORM::factory('Lot')
#7 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Import->action_ajax_plupload()
#8 [internal function]: Kohana_Controller->execute()
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Import))
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 /home/fthmgedcbc/www/index.php(118): Kohana_Request->execute()
#13 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 12:19:12 --- INFO: [Utilisateur : admin_vivetic] [Action : Création du lot 28] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-19 12:26:47 --- EMERGENCY: Database_Exception [ 2006 ]: MySQL server has gone away [ SHOW FULL COLUMNS FROM `lot` ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 12:26:47 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('lot')
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(NULL)
#6 /home/fthmgedcbc/www/application/classes/Controller/Import.php(170): Kohana_ORM::factory('Lot')
#7 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Import->action_ajax_plupload()
#8 [internal function]: Kohana_Controller->execute()
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Import))
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 /home/fthmgedcbc/www/index.php(118): Kohana_Request->execute()
#13 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 13:01:11 --- EMERGENCY: Database_Exception [ 2006 ]: MySQL server has gone away [ SHOW FULL COLUMNS FROM `lot` ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 13:01:11 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('lot')
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(NULL)
#6 /home/fthmgedcbc/www/application/classes/Controller/Import.php(170): Kohana_ORM::factory('Lot')
#7 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Import->action_ajax_plupload()
#8 [internal function]: Kohana_Controller->execute()
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Import))
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 /home/fthmgedcbc/www/index.php(118): Kohana_Request->execute()
#13 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 13:23:52 --- EMERGENCY: Database_Exception [ 2006 ]: MySQL server has gone away [ SHOW FULL COLUMNS FROM `lot` ] ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 177 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 13:23:52 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(341): Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Database_MySQLi->list_columns('lot')
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(NULL)
#6 /home/fthmgedcbc/www/application/classes/Controller/Import.php(170): Kohana_ORM::factory('Lot')
#7 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Import->action_ajax_plupload()
#8 [internal function]: Kohana_Controller->execute()
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Import))
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 /home/fthmgedcbc/www/index.php(118): Kohana_Request->execute()
#13 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:341
2015-10-19 13:42:02 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:42:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:42:07 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:42:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:43:27 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:43:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:43:30 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:43:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:43:30 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:43:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:43:30 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:43:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:43:35 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:43:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:43:53 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:43:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:43:55 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:43:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:45:01 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2015-10-19 13:45:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:47:53 --- EMERGENCY: ErrorException [ 1 ]: Access to undeclared static property: Database_MySQLi::$_last_connection_handle ~ APPPATH/classes/Controller/Lot.php [ 268 ] in file:line
2015-10-19 13:47:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-19 13:58:08 --- EMERGENCY: Database_Exception [ 2006 ]: [2006] MySQL server has gone away ( SHOW FULL COLUMNS FROM `lot` ) ~ MODPATH/mysqli/classes/Kohana/Database/MySQLi.php [ 188 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Kohana/Database/MySQLi.php:355
2015-10-19 13:58:08 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Kohana/Database/MySQLi.php(355): Kohana_Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(1668): Kohana_Database_MySQLi->list_columns('lot')
#2 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#3 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#4 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#5 /home/fthmgedcbc/www/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(NULL)
#6 /home/fthmgedcbc/www/application/classes/Controller/Import.php(170): Kohana_ORM::factory('Lot')
#7 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Import->action_ajax_plupload()
#8 [internal function]: Kohana_Controller->execute()
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Import))
#10 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#13 {main} in /home/fthmgedcbc/www/modules/mysqli/classes/Kohana/Database/MySQLi.php:355
2015-10-19 14:17:35 --- INFO: [Utilisateur : admin_vivetic] [Action : Création du lot 29] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-19 15:25:18 --- INFO: [Utilisateur : admin_vivetic] [Action : Création du lot 30] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-19 15:41:53 --- INFO: [Utilisateur : admin_vivetic] [Action : Création du lot 31] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-19 16:42:57 --- INFO: [Utilisateur : Admin_Fthm] [Action : Création du lot 32] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84