<script type='text/javascript'>
  var userAjaxBrowseURL = '<?= URL::site('user/ajax_browse'); ?>',
    userAjaxGetURL = '<?= URL::site('user/ajax_user_get') ?>/',
    userAjaxDeleteURL = '<?= URL::site('user/ajax_user_delete'); ?>',
    userPostInsertURL = '<?= URL::site('user/post_user_insert'); ?>',
    userAjaxChangeStep = '<?= URL::site('user/ajax_changestep'); ?>',
    userAjaxChangeUser = '<?= URL::site('user/ajax_changeuser'); ?>',
    userAjaxValidStep = '<?= URL::site('user/ajax_validsteps'); ?>'	
	;
</script>

<div class="page-title">Administration - Liste des utilisateurs</div>

<div class="message" style="display:none;"></div>

<div class="datatable-container">

  <div style="margin-bottom:10px;" ><input type="button" class="classic-button" value="Ajouter un utilisateur" onclick="showUserForm();"></div>
  <table cellpadding='0' cellspacing='0' border='0' class='display' id='user_list' style='font-size: 0.9em;'>
    <thead>
      <tr>
	<th></th>
	<th>Nom d'utilisateur</th>
	<th width="250px">E-Mail</th>
	<th>Nom</th>
	<th>Prénom</th>
	<th width="130px">Rôle</th>
	<th width="130px">Création</th>
	<th width="130px">Modification</th>
	<th width="130px">Dernière connexion</th>
	<th width="100px">Nombre de connexions</th>
      </tr>
    </thead>

    <tbody>
    </tbody>

  </table>

</div>

<div id="user-form" class="classic-form" style="display:none;">
    <img src="<?= URL::site('public/img/close.png'); ?>" style="position:absolute;top:2px;right:2px;cursor:pointer;" onClick="$(this).parent().bPopup().close(); return true;" />
    <div class="error" style="display:none;"></div>

    <input type="hidden" id="user_id" value=""/>

    <div style="margin-top:20px;">
      <label for="user_email" class="users" >E-Mail<font class="mandatory">*</font></label>
      <input id="user_email"  class="users classic-input" value="" />
    </div>

    <div style="margin-top:10px;">
      <label for="user_username" class="users" >Nom d'utilisateur<font class="mandatory">*</font></label>
      <input id="user_username" class="users classic-input" value=""/>
    </div>


    <div style="margin-top:10px;">
      <label for="user_lastname" class="users">Nom<font class="mandatory">*</font></label>
      <input id="user_lastname" class="users classic-input" value="" />
    </div>


    <div style="margin-top:10px;">
      <label for="user_firstname" class="users" >Prénom<font class="mandatory">*</font></label>
      <input id="user_firstname"  class="users classic-input" value="" />
    </div>


    <div style="margin-top:10px;">
      <label for="user_password" class="users" >Mot-de-passe<font class="mandatory">*</font></label>
      <input id="user_password" type="password" class="password classic-input" value="" />
    </div>

    <div style="margin-top:10px;">
      <label for="user_password_confirm" class="users" >Confirmation du mot-de-passe<font class="mandatory">*</font></label>
      <input id="user_password_confirm" type="password" class="password classic-input" value="" />
    </div>

    <div style="margin-top:10px;">
      <div><?= Form::label('role', 'Rôle de l\'utilisateur <font class="mandatory">*</font>', array('class' => 'users')); ?></div>
      <?= Form::select('role', $role, null, array('id' => 'role','class' => 'classic-input', 'onChange' => 'return set_admin_project(this);')); ?>
    </div>

    <div style="margin-top:10px;">
      <div><?= Form::label('projet', 'Projet <font class="mandatory">*</font>', array('class' => 'users')); ?></div>
      <?= Form::select('projet', $tb_proj, null, array('id' => 'projet','class' => 'classic-input', 'onChange' => 'return set_admin_project(this);', 'multiple' => 'multiple')); ?>	  
    </div>

	
    <hr id="horizontal-line" style="margin-top:25px;">

    <div id="lbl_user_lastlogin" style="font-size:0.8em;">
      <label for="user_lastlogin" class="users">Dernière connexion:</label>
      <label id="user_lastlogin"  text="" style="width:200px;"/>
    </div>

    <div id="lbl_user_logins" style="margin-top:10px;font-size:0.8em;">
      <label for="user_logins" class="users">Nombre de connexions:</label>
      <label id="user_logins" text="" />
    </div>


    <br />

    <span style="float:right;">
      <input class="classic-button" type="button" id="btn_insert" onclick="insertUser();" value="Valider" />&nbsp
	  <input class="classic-button" type="button" id="btn_addstep" onclick="show_step_form()" value="Attribuer étapes" />&nbsp
      <input class="classic-button" type="button" id="btn_delete"  onclick="deleteClick();" value="Supprimer" />&nbsp;
      <input class="classic-button" type="button" onclick="$('div#user-form').bPopup().close();" value="Annuler" />
    </span>
</div>

<div id="step-form" class="classic-form" style="display:none;">
	  <img src="<?= URL::site('public/img/close.png'); ?>" style="position:absolute;top:2px;right:2px;cursor:pointer;" onClick="$(this).parent().bPopup().close(); return true;" />
      <div style="margin-top:10px;">
		<div><?= Form::label('Utilisateur', 'Utilisateur'); ?></div>
		<?= Form::select('utilisateur', $tb_user, null, array('id' => 'utilisateur_id' , 'class'=>'form-control classic-input' , 'style' => 'width: 250px !important;','onchange'=> 'change_user_value()')); ?>
      </div>

	
      <div style="margin-top:10px;">
		<div><?= Form::label('Projet', 'Projet'); ?></div>
		<?= Form::select('projet', $tb_proj, null, array('id' => 'pro_id' , 'class'=>'form-control classic-input' , 'style' => 'width: 250px !important;','onchange'=> 'change_step_value()')); ?>	  
      </div>

      <div style="margin-top:10px;height:80px;">
		<div><?= Form::label('Etape', 'Etapes du projet'); ?></div>
		<?= Form::select('etape', $liste_etape, null, array('id' => 'etp_id' , 'class'=>'form-control classic-input' , 'style' => 'width: 250px !important;', 'multiple'=>'multiple' )); ?>
      </div>

      <div style="text-align:right; position:relative; top:20px;">
		<input class="classic-button" type="button" value="Valider" onclick="valid_user_steps()">
      </div>

</div>
