<?php
	require_once("Mail.php");
	$user_username = "rakoto";
	$mdp_motdepasse	= "123456";
	//$mail_to = "ramarson.aina@gmail.com";
	$mail_to = "hasina@vivetic.mg";
	$msg = '
	<html>
	  <head>
		<title></title>
		<meta content="fr" http-equiv="Content-Language" />
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
	  </head>

	  <body>
		<p>
				Bonjour, suite à votre demande le mot-de-passe de l\'utilisateur <b><i>' . $user_username . '</i></b> a été ré-initialisé.
		</p>

		<p>
				Votre nouveau mot-de-passe est: <b>'. $mdp_motdepasse . '</b>
		</p>

	  </body>
	</html>' . "\r\n";

	$mail = new Mailer(
	  "FTHM WEB",
	  "doNotReply@vivetic.mg",
	  $mail_to,
	  "",
	  "",
	  "doNotReply@vivetic.mg",
	  "FTHM WEB",
	  "FTHM - Changement Mot de passe",
	  $msg
	);

	$benvoie = $mail->process_mail();

	echo "benvoie : ".$benvoie;
?>