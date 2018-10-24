<div class="page-title">
Administration - Informations sur l'utilisateur courant
</div>

<div class="form-info">
  <h2>
    <?= ucfirst(strtolower($user->username)) . ' (' . ucfirst(strtolower($user->userfirstname)) . ' ' . ucfirst(strtolower($user->userlastname)) . ')'; ?>
  </h2>

  <ul>
      <li><b>E-mail</b>: <a href='mailto:<?= $user->email; ?>'><?= $user->email; ?></a></li>
      <li><b>Rôle</b>: <?= $role ?></li>
	<?php
	$clTzSec = Session::instance()->get('clTzSec');
	$lastlastLogin = 'Première connexion';
	if ($user->lastlast_login != NULL) {
		$lastlastLoginDT = new DateTime();
		$lastlastLoginDT->setTimezone(new DateTimezone('UTC'));
		$lastlastLoginDT->setTimestamp($user->lastlast_login);
		$lastlastLoginDT = date_add($lastlastLoginDT, DateInterval::createFromDateString($clTzSec . ' seconds'));
		$lastlastLogin = $lastlastLoginDT->format('d/m/Y H:i:s');
	}
	?>
      <li><b>Dernière connexion</b>: <?= $lastlastLogin; ?></li>
      <li><b>Nombre de connexions</b>: <?= $user->logins; ?></li>
	  <li><b>Projet</b>: <?= $projet["nom_projet"]; ?></li>
  </ul>
</div>