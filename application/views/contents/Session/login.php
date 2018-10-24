<script type='text/javascript'>
  var loginSetUserURL = '<?= URL::site('passwordrecovery/post_setLoginUser'); ?>',
    lostPasswordURL = '<?= URL::site('passwordrecovery/lostpassword') ?>/';
</script>


<div style="text-align:center;">
  <img src="<?= URL::base() . 'public/img/LogoFTHM-BIG.jpg';?>">
</div>

<?php if ($message) : ?>
<div class="error" style="margin-top:20px;padding:10px;">
	  <?= $message; ?>
</div>
<?php endif; ?>

<div style="margin:auto;width:425px;border: 1px solid #000;padding:15px;margin-top:30px;">
  <?= Form::open('/'); ?>

  <div class="login-field">
    <div><?= Form::label('username', 'Nom d\'utilisateur'); ?></div>
    <?= Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array('id' => 'username')); ?>
  </div>

  <div class="login-field">
    <div><?= Form::label('password', 'Mot de passe'); ?></div>
    <?= Form::password('password'); ?>
  </div>

  <div style="margin-top:10px;text-align:right;">
    <?= Form::submit('login', 'Connexion'); ?>
  </div>
  <?= Form::close(); ?>

  <a style="color: #FF0000;cursor:pointer;" onClick="goToPasswordRecovery();" >Mot de passe oublié? Cliquez ici</a>

</div>
