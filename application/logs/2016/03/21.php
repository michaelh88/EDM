<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-03-21 08:49:43 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 273] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 08:49:47 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 274] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 08:50:06 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 275] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 09:45:35 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 276] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 09:46:20 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 277] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 11:43:34 --- INFO: [Utilisateur : svaratraza] [Action : Création du lot 278] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 12:51:14 --- INFO: [Utilisateur : ssambodimanga] [Action : Création du lot 279] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 12:51:29 --- INFO: [Utilisateur : ssambodimanga] [Action : Création du lot 280] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 12:51:35 --- INFO: [Utilisateur : ssambodimanga] [Action : Création du lot 281] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 15:59:25 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (HY000/2003): Can't connect to MySQL server on 'mysql55-9.pro' (111) ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2016-03-21 15:59:25 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
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
2016-03-21 15:59:49 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (HY000/2003): Can't connect to MySQL server on 'mysql55-9.pro' (111) ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2016-03-21 15:59:49 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
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
2016-03-21 16:00:00 --- EMERGENCY: Database_Exception [ 2 ]: mysqli_connect(): (HY000/2003): Can't connect to MySQL server on 'mysql55-9.pro' (111) ~ MODPATH/mysqli/classes/Database/MySQLi.php [ 61 ] in /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php:160
2016-03-21 16:00:00 --- DEBUG: #0 /home/fthmgedcbc/www/modules/mysqli/classes/Database/MySQLi.php(160): Database_MySQLi->connect()
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
2016-03-21 16:00:56 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 282] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 16:01:12 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 283] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 16:01:27 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 284] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-03-21 16:02:35 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 285] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84