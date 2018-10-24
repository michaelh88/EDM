<?php defined('SYSPATH') or die('No direct script access.');

// require_once(Kohana::find_file('vendor', 'Vivetic/Mail'));
require_once(Kohana::find_file('vendor', 'Vivetic/PHPMailerAutoload'));
require_once(Kohana::find_file('vendor', 'Vivetic/Password'));

final class Controller_Passwordrecovery extends Controller {

    final public function action_lostpassword()
    {
	$session = Session::instance();

	$username = $session->get('typedUsername', null);
	!isset($username)
	  && HTTP::redirect('/');

	$layout = View::factory('layouts/login');
	$layout->page_title = 'Mot de passe oubli&eacute;';
	$layout->content = View::factory('contents/Passwordrecovery/lostpassword');
	$layout->content->username = $username;
	$this->response->body($layout);
    }

    final public function action_post_lostpassword_sendmail()
    {
		$mail_to = $this->request->post('usermail');
		$layout = View::factory('layouts/login');
		$layout->page_title = 'Mot de passe oubli&eacute;';
		$layout->content = View::factory('contents/Passwordrecovery/lostpassword')
		  ->bind('msg_error', $msg_error)
		  ->bind('msg_sent', $msg_sent);
		$sms = "sms vide";
		if(filter_var($mail_to, FILTER_VALIDATE_EMAIL))
		{
		  try{
			  $session = Session::instance();
			  $sms = $session->get('typedUsername');
			  if ($session->get('typedUsername') != null) {

				$user = ORM::factory('User')
				->where('email','=',$mail_to)
				->where('username', '=', $session->get('typedUsername'))
				->find();


				if ($user->loaded()){
				
				$sms = $user->username;

				$mdp = new Password();
				$user->password = $mdp->motdepasse;
				$user->save();

				$msg = '
	<html>
	  <head>
		<title></title>
		<meta content="fr" http-equiv="Content-Language" />
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
	  </head>

	  <body>
		<p>
				Bonjour, suite à votre demande le mot-de-passe de l\'utilisateur <b><i>' . $user->username . '</i></b> a été ré-initialisé.
		</p>

		<p>
				Votre nouveau mot-de-passe est: <b>'. $mdp->motdepasse . '</b>
		</p>

	  </body>
	</html>' . "\r\n";

				// $mail = new Mailer(
				  // "FTHM WEB",
				  // "infodev@vivetic.mg",
				  // $mail_to,
				  // "",
				  // "",
				  // "infodev@vivetic.mg",
				  // "FTHM WEB",
				  // "FTHM - Changement Mot de passe",
				  // $msg
				// );

				// $benvoie = $mail->process_mail();

				$mailDest = array( 
					array($mail_to,$user->username),
				);
				$mailCC = array(
					array($mail_to,$user->username),
				);				
				
				
				$mail  = new PHPMailer();
				$mail->CharSet = "UTF-8";
				$mail->isHTML(true);
				$mail->Subject    = "FTHM - Changement Mot de passe";
				$mail->MsgHTML($msg);
				$mail->SetFrom('doNotReply@vivetic.mg', 'Equipe FTHM');
				foreach ($mailDest as $dest)
					$mail->addAddress($dest[0], $dest[1]);
				if (isset($mailCC)){
					foreach ($mailCC as $cc)
						$mail->addCC($cc[0], $cc[1]);
				}
				if(!$mail->Send()) {
					// echo "<br/> Mailer Error: " . $mail->ErrorInfo;
					$benvoie = 0;
				}
				else {
					// echo "<br/> Mail sent!";
					$benvoie = 1;
				}
				
				Kohana::$log->add(LOG::INFO, 'Envoie mail récupération pass - status: ' . $benvoie);
				}
			  }
		  }
		  catch (ORM_Validation_Exception $e) {

		  }

		  $msg_sent = Kohana::message('misc','session.msg_sent');
		  // $msg_sent = $sms;

		}
		else {
		  $msg_error = 'Mauvais format e-mail';
		}

		$_POST = array();
		$this->response->body($layout);
    }

	final public function action_alefaso() {
				$mdp = new Password();
				$mail_to = "hasina@vivetic.mg";
				$user_username = "hasina";
				
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
								Votre nouveau mot-de-passe est: <b>'. $mdp->motdepasse . '</b>
						</p>

					  </body>
					</html>' . "\r\n";

				echo $msg;
				// return false;
				
				echo "<br> 1";
				$mailDest = array( 
					array($mail_to,$user_username),
				);
				echo "<br> 2";
				$mailCC = array(
					array($mail_to,$user_username),
				);				
				echo "<br> 3";
				
				
				$mail  = new PHPMailer();
				echo "<br> 4";
				$mail->CharSet = "UTF-8";
				echo "<br> 5";
				$mail->isHTML(true);
				echo "<br> 6";
				$mail->Subject    = "FTHM - Changement Mot de passe";
				echo "<br> 7";
				$mail->MsgHTML($msg);
				echo "<br> 8";
				$mail->SetFrom('infodev@vivetic.mg', 'VIVETIC - Equipe IT');
				echo "<br> 9";
				foreach ($mailDest as $dest)
					$mail->addAddress($dest[0], $dest[1]);
				echo "<br> 10";
				if (isset($mailCC)){
					foreach ($mailCC as $cc)
						$mail->addCC($cc[0], $cc[1]);
				}
				echo "<br> 11";
				if(!$mail->Send()) {
					echo "<br/> Mailer Error: " . $mail->ErrorInfo;
					$benvoie = 0;
				}
				else {
					echo "<br/> Mail sent!";
					$benvoie = 1;
				}
				echo "<br> 13";
		
	}
	
    final public function action_post_setLoginUser() {

		if (HTTP_Request::POST != $this->request->method())
		  exit();

		$status = 1;

		$username = '';
		if (isset($_POST['username']) && ($username = trim($_POST['username'])) != '') {

		  $session = Session::instance();
		  $session->set('typedUsername', $username);
		  $status = 0;
		}

		$this->response->body($status);
    }



}
