<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-07-14 07:44:10 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2427] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 07:44:44 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2428] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 07:47:35 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2429] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 07:47:47 --- INFO: [Utilisateur : stationvoahirana] [Action : Création du lot 2430] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 08:51:51 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2431] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 08:52:20 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2432] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 08:52:31 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2433] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 08:52:56 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2434] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 08:53:29 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2435] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 08:53:37 --- INFO: [Utilisateur : ssvatosoa] [Action : Création du lot 2436] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 09:37:27 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2437] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 09:37:45 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2438] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 09:38:00 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2439] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 09:38:02 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2440] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 09:38:04 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2441] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 09:38:17 --- INFO: [Utilisateur : ssmafana] [Action : Création du lot 2442] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 13:30:40 --- EMERGENCY: ErrorException [ 2 ]: mail(): Multiple or malformed newlines found in additional_header ~ APPPATH/vendor/Vivetic/Mail.php [ 174 ] in file:line
2016-07-14 13:30:40 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'mail(): Multipl...', '/home/fthmgedcb...', 174, Array)
#1 /home/fthmgedcbc/www/application/vendor/Vivetic/Mail.php(174): mail('prakotomahandry...', 'FTHM - Changeme...', '--_f8867d5fb504...', 'From: FTHM WEB ...')
#2 /home/fthmgedcbc/www/application/classes/Controller/Passwordrecovery.php(82): Mailer->process_mail()
#3 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Passwordrecovery->action_post_lostpassword_sendmail()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passwordrecovery))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#9 {main} in file:line
2016-07-14 13:31:15 --- EMERGENCY: ErrorException [ 2 ]: mail(): Multiple or malformed newlines found in additional_header ~ APPPATH/vendor/Vivetic/Mail.php [ 174 ] in file:line
2016-07-14 13:31:15 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'mail(): Multipl...', '/home/fthmgedcb...', 174, Array)
#1 /home/fthmgedcbc/www/application/vendor/Vivetic/Mail.php(174): mail('prakotomahandry...', 'FTHM - Changeme...', '--_f1faf19d9771...', 'From: FTHM WEB ...')
#2 /home/fthmgedcbc/www/application/classes/Controller/Passwordrecovery.php(82): Mailer->process_mail()
#3 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Passwordrecovery->action_post_lostpassword_sendmail()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passwordrecovery))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#9 {main} in file:line
2016-07-14 13:33:36 --- EMERGENCY: ErrorException [ 2 ]: mail(): Multiple or malformed newlines found in additional_header ~ APPPATH/vendor/Vivetic/Mail.php [ 174 ] in file:line
2016-07-14 13:33:36 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'mail(): Multipl...', '/home/fthmgedcb...', 174, Array)
#1 /home/fthmgedcbc/www/application/vendor/Vivetic/Mail.php(174): mail('prakotomahandry...', 'FTHM - Changeme...', '--_65ad993e04fe...', 'From: FTHM WEB ...')
#2 /home/fthmgedcbc/www/application/classes/Controller/Passwordrecovery.php(82): Mailer->process_mail()
#3 /home/fthmgedcbc/www/system/classes/Kohana/Controller.php(84): Controller_Passwordrecovery->action_post_lostpassword_sendmail()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Passwordrecovery))
#6 /home/fthmgedcbc/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/fthmgedcbc/www/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 /home/fthmgedcbc/www/index.php(120): Kohana_Request->execute()
#9 {main} in file:line
2016-07-14 15:01:57 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2443] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 15:01:59 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2444] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 15:02:01 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2445] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 15:02:06 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2446] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 15:02:09 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2447] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 15:10:36 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2448] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 15:10:45 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2449] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 15:10:48 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2450] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 15:10:50 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2451] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84
2016-07-14 15:10:52 --- INFO: [Utilisateur : sssambitsara] [Action : Création du lot 2452] in /home/fthmgedcbc/www/system/classes/Kohana/Controller.php:84