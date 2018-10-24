<div class="page-title">
Administration - Attribuer etape à chaque utilisateur
</div>

<div style="position:relative;">

  <div style='position:absolute;top:45px;padding:30px;border: 1px solid #000;left:5px;'>

    <?= Form::open('user/savesteps'); ?>

      <div class='user-create-field'>
		<div><?= Form::label('Utilisateur', 'Utilisateur'); ?></div>
		<?= Form::select('utilisateur', $tb_user, null, array('id' => 'utilisateur_id' , 'class'=>'form-control' , 'style' => 'width: 250px !important;','onchange'=> 'change_user_value()')); ?>
      </div>

	
      <div class='user-create-field'>
		<div><?= Form::label('Projet', 'Projet'); ?></div>
		<?= Form::select('projet', $tb_proj, null, array('id' => 'pro_id' , 'class'=>'form-control' , 'style' => 'width: 250px !important;','onchange'=> 'change_step_value()')); ?>	  
      </div>

      <div class='user-create-field' style="margin-top:25px;">
		<div><?= Form::label('Etape', 'Etapes du projet'); ?></div>
		<?= Form::select('etape', $liste_etape, null, array('id' => 'etp_id' , 'class'=>'form-control' , 'style' => 'width: 250px !important;', 'multiple'=>'multiple' )); ?>
      </div>

      <div style="text-align:right; position:relative; top:20px;">
	  <input type="button" value="Valider" onclick="valid_user_steps()" class="classic-button">
      </div>

    <?= Form::close(); ?>

  </div>
</div>