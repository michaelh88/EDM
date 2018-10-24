<?php
	echo "<br>a";
	
	require_once('./clss/PHPMailerAutoload.php');
	echo "<br>b";

$mailDest = array( 
    array('rztherve@gmail.com','Herve'),
	array('ramarson.aina@gmail.com','Aina'),
);
	echo "<br>c";

$mailCC = array(
	array('rztherve@gmail.com','Herve'),
	array('ramarson.aina@gmail.com','Aina'),	
);	
	echo "<br>d";
	
	$user_username = "rakoto";
	$mdp_motdepasse	= "123456";
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


	echo "<br>1";
	
			$mail  = new PHPMailer(); // defaults to using php "mail()"
	echo "<br>2";
			$mail->CharSet = "UTF-8";
	echo "<br>3";
			$mail->isHTML(true);
	echo "<br>4";


			$mail->Subject    = "[FTHM] - Envoi mail ";
	echo "<br>5";

			$mail->MsgHTML($msg);
	echo "<br>6";

			$mail->SetFrom('infodev@vivetic.mg', 'VIVETIC - Equipe IT');
	echo "<br>7";

			foreach ($mailDest as $dest)
				$mail->addAddress($dest[0], $dest[1]);
	echo "<br>8";

			if (isset($mailCC)){
				foreach ($mailCC as $cc)
					$mail->addCC($cc[0], $cc[1]);
			}
	echo "<br>9";
			
			if(!$mail->Send()) {
				echo "<br/> Mailer Error: " . $mail->ErrorInfo;
			}
			else {
				echo "<br/> Mail sent!";
			}
	echo "<br>10";
	
?>