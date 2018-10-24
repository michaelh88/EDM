<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-07-21 07:35:25 --- EMERGENCY: ErrorException [ 2 ]: mail(): Multiple or malformed newlines found in additional_header ~ APPPATH/vendor/Vivetic/Mail.php [ 174 ] in file:line
2016-07-21 07:35:25 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'mail(): Multipl...', '/home/fthmgedcb...', 174, Array)
#1 /home/fthmgedcbc/www/application/vendor/Vivetic/Mail.php(174): mail('prakotomahandry...', 'FTHM - Changeme...', '--_b55b845540af...', 'From: FTHM WEB ...')
#2 /home/fthmgedcbc/www/application/classes/Controller/Passwordrecovery.php(82): Mailer->process_mail()
#3 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Passwordrecovery->action_post_lostpassword_sendmail()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passwordrecovery))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#9 {main} in file:line
2016-07-21 09:07:20 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2564] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:07:25 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2565] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:07:37 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2566] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:07:45 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2567] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:08:03 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2568] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:08:11 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2569] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:44:37 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2570] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:44:39 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2571] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:44:58 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2572] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:45:16 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2573] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:45:40 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2574] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:45:41 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2575] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-21 09:45:43 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2576] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84