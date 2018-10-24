<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-10-14 11:16:45 --- INFO: [Utilisateur : admin_vivetic] [Action : Création d'un message pour le lot3] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-14 12:02:26 --- INFO: [Utilisateur : admin_vivetic] [Action : Création d'un message pour le lot 7] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-14 12:03:40 --- INFO: [Utilisateur : hasina.cp] [Action : Mise à jour de l'état du message (lu) pour le lot 7] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-14 13:18:47 --- INFO: [Utilisateur : admin_vivetic] [Action : Création du lot 25] in /home/fthmgedcbc/www/application/classes/Controller/Import.php:102
2015-10-14 13:38:26 --- INFO: [Utilisateur : admin_vivetic] [Action : Creation utilisateur : opvivetic] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-14 13:39:20 --- INFO: [Utilisateur : admin_vivetic] [Action : Modification utilisateur : opvivetic] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-14 13:55:48 --- INFO: [Utilisateur : admin_vivetic] [Action : Creation utilisateur : opfthm] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-14 14:03:05 --- INFO: [Utilisateur : admin_vivetic] [Action : Création d'un message pour le lot 7] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-14 15:35:23 --- EMERGENCY: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH/classes/Kohana/Session.php [ 324 ] in /home/fthmgedcbc/www/system/classes/Kohana/Session.php:125
2015-10-14 15:35:23 --- DEBUG: #0 /home/fthmgedcbc/www/system/classes/Kohana/Session.php(125): Kohana_Session->read(NULL)
#1 /home/fthmgedcbc/www/system/classes/Kohana/Session.php(54): Kohana_Session->__construct(Array, NULL)
#2 /home/fthmgedcbc/www/modules/auth/classes/Kohana/Auth.php(58): Kohana_Session::instance('native')
#3 /home/fthmgedcbc/www/modules/auth/classes/Kohana/Auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /home/fthmgedcbc/www/application/classes/Controller/Website.php(37): Kohana_Auth::instance()
#5 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(69): Controller_Website->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Alerts))
#8 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#10 /home/fthmgedcbc/www/index.php(118): Kohana_Request->execute()
#11 {main} in /home/fthmgedcbc/www/system/classes/Kohana/Session.php:125
2015-10-14 17:33:04 --- INFO: [Utilisateur : opvivetic] [Action : Mise à jour de l'état du message (lu) pour le lot 7] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-14 17:34:00 --- INFO: [Utilisateur : opvivetic] [Action : Création d'un message pour le lot 7] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2015-10-14 17:49:11 --- INFO: [Utilisateur : hasina.cp] [Action : Mise à jour de l'état du message (lu) pour le lot 7] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84