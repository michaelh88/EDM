<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-08-12 08:48:43 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2884] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 08:49:18 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2885] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 08:49:41 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2886] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 08:50:04 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2887] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 08:50:15 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2888] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 08:50:39 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2889] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 08:50:47 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2890] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 08:50:53 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2891] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 09:57:30 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2892] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 09:58:19 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2893] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 09:59:41 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2894] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 10:00:09 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2895] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 10:00:20 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2896] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 10:00:31 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2897] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-08-12 12:26:30 --- EMERGENCY: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH/classes/Kohana/Session.php [ 324 ] in /home/fthmgedcbc/www/system/classes/Kohana/Session.php:125
2016-08-12 12:26:30 --- DEBUG: #0 /home/fthmgedcbc/www/system/classes/Kohana/Session.php(125): Kohana_Session->read(NULL)
#1 /home/fthmgedcbc/www/system/classes/Kohana/Session.php(54): Kohana_Session->__construct(Array, NULL)
#2 /home/fthmgedcbc/www/modules/auth/classes/Kohana/Auth.php(58): Kohana_Session::instance('native')
#3 /home/fthmgedcbc/www/modules/auth/classes/Kohana/Auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /home/fthmgedcbc/www/application/classes/Controller/Website.php(37): Kohana_Auth::instance()
#5 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(69): Controller_Website->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Lot))
#8 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#11 {main} in /home/fthmgedcbc/www/system/classes/Kohana/Session.php:125