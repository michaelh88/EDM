<div style="text-align:center;">
  <img src="<?= URL::base() . 'public/img/LogoFTHM-BIG.jpg';?>">
</div>

  <?php
	if (isset($msg_sent)) {
	if ($msg_sent) : ?>

    <div class="message" style="position:asolute; top:0px;">
      <?= $msg_sent; ?>
    </div>
  <?php endif; }?>

  <?php
	if (isset($msg_error)) {
	if ($msg_error) : ?>

    <div class="error" style="position:asolute; top:0px;">
      <?= $msg_error; ?>
    </div>
  <?php endif; }?>


<div style="margin:auto;width:554px;border: 1px solid #000;padding:15px;margin-top:30px;">
  <?= Form::open('/passwordrecovery/post_lostpassword_sendmail'); ?>

  <div style="text-align:center;">
    <div style="margin-bottom:10px;"><?= Form::label('usermail', 'Saisissez l\'adresse mail utilis&eacute;e pour cr&eacute;er le compte <b><?= $username ?></b>', array('style' => 'width:200px;')); ?></div>
    <?= Form::input('usermail', null, array('style' => 'width:400px;')); ?>
  </div>

  <div style="margin-top:30px;text-align:center;">

    <?= Form::submit('valid', "Re-générer le mot-de-passe");  ?>
  </div>
  <div style="margin-top:15px;text-align:left;">

    <a href="<?= URL::site('/') ?>"><< Retour</a>
  </div>
  <?= Form::close(); ?>


</div>
