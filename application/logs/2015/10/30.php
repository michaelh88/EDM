<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-10-30 08:13:33 --- INFO: [Utilisateur : hasina.cp] [Action : Modification du lot 42] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-30 08:56:58 --- INFO: [Utilisateur : Admin_Fthm] [Action : Mise à jour de l'état du message (lu) pour le lot 3] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-30 09:01:33 --- INFO: [Utilisateur : orazafindrakoto] [Action : Modification du lot 12] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-30 11:24:56 --- EMERGENCY: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH/classes/Kohana/Session.php [ 324 ] in /home/fthmgedcbc/www/system/classes/Kohana/Session.php:125
2015-10-30 11:24:56 --- DEBUG: #0 /home/fthmgedcbc/www/system/classes/Kohana/Session.php(125): Kohana_Session->read(NULL)
#1 /home/fthmgedcbc/www/system/classes/Kohana/Session.php(54): Kohana_Session->__construct(Array, NULL)
#2 /home/fthmgedcbc/www/modules/auth/classes/Kohana/Auth.php(58): Kohana_Session::instance('native')
#3 /home/fthmgedcbc/www/modules/auth/classes/Kohana/Auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /home/fthmgedcbc/www/application/classes/Controller/Website.php(37): Kohana_Auth::instance()
#5 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(69): Controller_Website->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Alerts))
#8 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#11 {main} in /home/fthmgedcbc/www/system/classes/Kohana/Session.php:125
2015-10-30 11:25:13 --- EMERGENCY: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH/classes/Kohana/Session.php [ 324 ] in /home/fthmgedcbc/www/system/classes/Kohana/Session.php:125
2015-10-30 11:25:13 --- DEBUG: #0 /home/fthmgedcbc/www/system/classes/Kohana/Session.php(125): Kohana_Session->read(NULL)
#1 /home/fthmgedcbc/www/system/classes/Kohana/Session.php(54): Kohana_Session->__construct(Array, NULL)
#2 /home/fthmgedcbc/www/modules/auth/classes/Kohana/Auth.php(58): Kohana_Session::instance('native')
#3 /home/fthmgedcbc/www/modules/auth/classes/Kohana/Auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /home/fthmgedcbc/www/application/classes/Controller/Website.php(37): Kohana_Auth::instance()
#5 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(69): Controller_Website->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Alerts))
#8 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#11 {main} in /home/fthmgedcbc/www/system/classes/Kohana/Session.php:125