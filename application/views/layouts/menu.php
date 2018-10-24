<script type='text/javascript'>
  $(document).ready(function () {
    $('#jMenu').jMenu({
      'ulWidth': 'auto',
      'animatedText': true,
      'effects': {
	'effectSpeedOpen' : 150,
	'effectSpeedClose' : 150,
	'effectTypeOpen' : 'slide',
	'effectTypeClose' : 'hide',
	'effectOpen' : 'linear',
	'effectClose' : 'linear'
      },
      'TimeBeforeOpening' : 10,
      'TimeBeforeClosing' : 11,
      'paddingLeft': 1
    });
  });
</script>

<div style="border-top: 1px solid #FFF;border-bottom: 1px solid #FFF;" class="back-color-main">
  <ul id='jMenu'>


    <li><a class="fNiv">Gestion des lots</a>
		<ul>
			<li class="arrow"></li>
			<li><a href="<?= URL::site('Lot/list'); ?>">Liste des lots</a></li>
			<?php
			 if ($current_user_role_name != 'operator') :
			?>
					<li><a href="<?= URL::site('import/import'); ?>">Création</a></li>
			<?php
			 endif;
			?>
			<li><a href="<?= URL::site('Lot/export_statistique'); ?>">Export statistique</a></li>
		</ul>
    </li>

    <li><a class="fNiv">Administration</a>
      <ul>
        <li class="arrow"></li>
			<?php
			 if ($current_user_role_name == 'admin' || $current_user_role_name == 'fthm_admin') :
			?>
					<li><a href="<?= URL::site('user/list'); ?>">Liste des utilisateurs</a></li>
			<?php
			 endif;
			?>
        <li><a href="<?= URL::site('user/changepass'); ?>">Changer mon mot de passe</a></li>
        <li><a href="<?= URL::site('user/info'); ?>">Informations sur l'utilisateur courant</a></li>
      </ul>
    </li>

  </ul>
</div>
