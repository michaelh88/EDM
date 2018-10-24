<div class="page-title">
Administration - Changer mon mot de passe
</div>

<div style="position:relative;">
  <?php if ($msg_global_err) : ?>

    <div class='error' style="position:asolute; top:0px;">
      <?= $msg_global_err; ?>
    </div>
  <?php elseif ($msg_global) : ?>

    <div class='message' style="position:absolute; top:0px;">
      <?= $msg_global; ?>
    </div>
  <?php endif; ?>


  <div id="frm" style='position:absolute;top:45px;padding:30px;border: 4px solid #333b57;left:5px;border-radius:16px;'>

    <?= Form::open('user/modifypass'); ?>


      <div class='user-create-field'>
	<div><?= Form::label('oldpassword', 'Ancien mot de passe <font class="mandatory">*</font>'); ?></div>
	<?= Form::input('oldpassword', '', array('type' => 'password', 'class'=>'classic-input')); ?>
	<span class='field-error'><?= Arr::get($errors, 'oldpassword'); ?></span>
      </div>

      <div class='user-create-field' style="margin-top:25px;">
	<div><?= Form::label('password', 'Nouveau mot de passe <font class="mandatory">*</font>'); ?></div>
	<?= Form::password('password','', array('class'=>'classic-input')); ?>
	<span class='field-error'><?= Arr::path($errors, 'misc.password'); ?></span>
      </div>

      <div class='user-create-field' style="margin-top:10px;">
	<div><?= Form::label('password_confirm', 'Confirmation du mot de passe <font class="mandatory">*</font>'); ?></div>
	<?= Form::password('password_confirm','', array('class'=>'classic-input')); ?>
	<span class='field-error'><?= Arr::path($errors, 'misc.password_confirm'); ?></span>
      </div>



      <div style="text-align:right; position:relative; top:20px;">
      <?= Form::submit('change', 'Enregistrer', array('class'=>'classic-button')); ?>
      </div>

    <?= Form::close(); ?>

  </div>
</div>