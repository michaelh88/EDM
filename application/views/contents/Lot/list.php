<?php 

$bucket = 'BUCKET';


$accessKeyId = 'ACCESS_KEY_ID';
$secret = 'SECRET_ACCESS_KEY';


$policy = base64_encode(json_encode(array(

	'expiration' => date('Y-m-d\TH:i:s.000\Z', strtotime('+1 day')),  
	'conditions' => array(
		array('bucket' => $bucket),
		array('acl' => 'public-read'),
		array('starts-with', '$key', ''),

		array('starts-with', '$Content-Type', 'image/'),

		array('starts-with', '$name', ''), 	

		array('starts-with', '$Filename', ''), 
	)
)));


$signature = base64_encode(hash_hmac('sha1', $policy, $secret, true));

?>
<script type='text/javascript'>
    var lotAjaxBrowseURL = '<?= URL::site('Lot/ajax_browse'); ?>',
    lotAjaxChangeProjetURL = '<?= URL::site('Lot/ajax_get_lot'); ?>',
    messageAjaxBrowseURL = '<?= URL::site('message/ajax_browse'); ?>',
    lotAjaxDataURL = '<?= URL::site('Lot/ajax_get_data'); ?>';
	lotAjaxResetURL = '<?= URL::site('Lot/ajax_reset_lot'); ?>';
	lotAjaxCreateMessageURL = '<?= URL::site('message/ajax_create_message'); ?>';
	lotAjaxUpdateEtatMessageURL = '<?= URL::site('message/ajax_update_etat'); ?>';
	lotAjaxGetEtapeLotURL = '<?= URL::site('Lot/ajax_get_etape_lot'); ?>';
	lotAjaxUpdateEtapeURL = '<?= URL::site('Lot/ajax_update_etape'); ?>';
	lotAjaxExportStatistiqueURL = '<?= URL::site('Lot/ajax_export_statistique'); ?>';
	lotAjaxGetJsonURL = '<?= URL::site('script/exportation.php'); ?>';
	lotAjaxAvancementGlobalURL = '<?= URL::site('Lot/ajax_avancement_global'); ?>';
	lotAjaxDowloadFile = '<?= URL::site('Lot/ajax_check_file'); ?>';
	lotAjaxGetMessageURL = '<?= URL::site('message/ajax_get_message'); ?>';

</script>

<div class="page-title">Lot - Liste des dossiers comptables</div>

<div class="message" style="display:none;"></div>
<!--filtre debut-->
<input type="hidden" id="mu_id" value="<?php echo $mu_id; ?>">
<div id="filtre_datatable" class="filtre-datatable clearfix" style="display: block;">
    <form id="form_filtre_lot">
	<div class="filtre_contenu clearfix">


        <div class="div_filtre">
            <div class="div_filtre_label">
				<div><label class="label_filtre" >Projet</label></div>
                <?php
                echo Form::image('img_projet', '', array('src' => 'public/img/eraser.png', 'id' => 'img_projet', 'title' => 'Effacer la selection','data-id' => 'data_projet',
					'style' => 'margin-left: 25px; margin-top: -16px;'));
                ?>

            </div>
            <div class="div_filtre_date">
                <?php echo Form::select('data_projet', $data_projet, null, array('multiple', 'class' => 'classic-input select_filtre', 'id' => 'data_projet' )); ?>
            </div>
        </div>


		<?php
		if($data_role_act != '6'){
		?>
			<span id="client" style="display:none;"><?php echo $data_role_act; ?></span>
			<div class="div_filtre">
				<div class="div_filtre_label">
					<div><label class="label_filtre">Commande Vivetic</label></div>
					<?php
					echo Form::image('img_commande', '', array('src' => 'public/img/eraser.png', 'id' => 'img_commande', 'title' => 'Effacer la selection',
						'data-id' => 'data_commande_vivetic', 'style' => 'margin-left: 105px; margin-top: -16px;'));
					?>
				</div>
				<div class="div_filtre_date">
					<?php echo Form::select('data_commande', $data_commande_vivetic, null, array('multiple', 'class' => 'classic-input select_filtre', 'id' => 'data_commande_vivetic')); ?>
				</div>
			</div>
		<?php
		} else {
		?>
			<span id="client" style="display:none;"><?php echo $data_role_act; ?></span>
			<input type="hidden" id="data_commande_vivetic" name ="data_commande" value="">
			<input width="20px" type="hidden" height="20px" data-id="data_commande_vivetic"  value="" name="img_datetime_creation" id="img_commande_vivetic">
		<?php
		}
		?>
        <div class="div_filtre">
            <div class="div_filtre_label">
                <div><label class="label_filtre">Lot</label></div>
				<?php
                echo Form::image('img_lot', '', array('src' => 'public/img/eraser.png', 'id' => 'img_lot', 'title' => 'Effacer la selection',
					'data-id' => 'data_lot', 'style' => 'margin-left: 6px; margin-top: -16px;'));
                ?>
            </div>
            <div class="div_filtre_date">
                <?php echo Form::select('data_lot', $data_lot, null, array('multiple', 'class' => 'classic-input select_filtre', 'id' => 'data_lot')); ?>
            </div>
        </div>

		<div class="div_filtre">
            <div class="div_filtre_label">
                <div><label class="label_filtre">Lot client</label></div>
				<?php
                echo Form::image('img_nom_zip', '', array('src' => 'public/img/eraser.png', 'id' => 'img_nom_zip', 'title' => 'Effacer la selection',
					'data-id' => 'data_nom_zip', 'style' => 'margin-left: 46px; margin-top: -16px;'));
                ?>
            </div>
            <div class="div_filtre_date">
                <?php echo Form::select('data_nom_zip', $data_nom_zip, null, array('multiple', 'class' => 'classic-input select_filtre', 'id' => 'data_nom_zip')); ?>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="div_filtre">
            <div class="div_filtre_label">
                <div><label class="label_filtre">Etat commande</label></div>
				<?php
                echo Form::image('img_etat', '', array('src' => 'public/img/eraser.png', 'id' => 'img_etat', 'title' => 'Effacer la selection',
					'data-id' => 'data_etat', 'style' => 'margin-left: 87px; margin-top: -16px;'));
                ?>
            </div>
            <div class="div_filtre_date">
                <select multiple="multiple" class="classic-input select_filtre" name="data_etat" id="data_etat">
                    <option value="Alerte délai">Alerte délai</option>
					<option value="Créé">Créé</option>
                    <option value="En cours">En cours</option>
                    <option value="Terminé">Terminé</option>
					<option value=''>Tout</option>
                </select>
            </div>
        </div>


        <div class="clearfix"></div>

        <div class="div_filtre div_filtre1" style="height: 60px;">
            <div class="div_filtre_label">
                <div><label class="label_filtre">Date de création</label></div>
				<?php
                echo Form::image('img_datetime_creation', '', array('src' => 'public/img/eraser.png', 'id' => 'img_datetime_creation', 'title' => 'Effacer la date',
					'data-id' => 'data_datetime_creation', 'style' => 'margin-left: 93px; margin-top: -16px;'));
                ?>
            </div>
            <div class="div_filtre_date">
                <?php
                echo Form::input('data_datetime_creation', '', array('class' => 'classic-input date_filtre', 'id' => 'data_datetime_creation', 'readonly' => 'readonly'));
                ?>
            </div>
        </div>



    </div>
    <div class="clearfix"></div>
    <div class="div_filtre_btn div_filtre_fin">
        <?php
        echo Form::button('rechercher', 'Rechercher', array('id' => 'btn_rechercher', 'type' => 'button', 'class'=>'classic-button btn-lot-action '));
        ?>
    </div>
	<div class="div_filtre_btn div_filtre_fin">
        <?php
        echo Form::button('reinitialiser', 'Réinitialiser', array('id' => 'btn_reinitialiser', 'type' => 'button', 'class'=>'classic-button btn-lot-action ', 'onclick' => 'this.form.reset()'));
        ?>
    </div>
	<div class="div_filtre_btn div_filtre_fin">
        <?php
        echo Form::button('avancement_global', 'Avancement global', array('id' => 'btn_avancement_global', 'type' => 'button', 'class'=>'classic-button btn-lot-action '));
        ?>
    </div>

	</form>
    <div class="clearfix"></div>


	<label class="label_filtre" id="afficher_avglobal"></label>

	</div>
</div>
<!--filtre fin-->


<!--table debut-->

<div class="datatable-container" style="margin-top: 10px; margin-bottom: 10px;">

    <table cellpadding='0' cellspacing='0' border='0' class='display' id='lot_list' style='font-size: 0.8em;'>
        <thead>
            <tr>
                <th id="lot_id"></th>
                <th id="nom_projet">Projet</th>
                <th id="commande_vivetic">Commande vivetic</th>
                <th id="datetime_creation">Date de création</th>
                <th id="nombre_doc">Nombre de PDF</th>
                <th id="nom_zip_original">Lot client</th>
                <th id="etat">Etat</th>
                <th id="nom_zip">Lot</th>
                <th id="createur_lot">Créateur du lot</th>
                <th id="datetime_modification">Dernière modification</th>
                <th id="modificateur_lot">Modificateur lot</th>
                <th id="datetime_validation">Mise à disposition vivetic</th>
                <th id="volume_piece">Nombre de pièces comptables</th>
                <th id="avancement_globale">Avancement</th>
                <th id="nb_notif">Nombre de notifications</th>
                <th id="duree_traitement">Durée de traitement globale</th>
                <th id="telechargement">Action</th>
				<th id="avglobal"></th>
            </tr>
        </thead>

        <tbody>
        </tbody>

    </table>

</div>
<!--table fin-->
<!--POPUP debut-->
<div id="lot-form" class="classic-form" style="display:none;">
    <img src="<?= URL::site('public/img/close.png'); ?>" class="img-close-popup" onClick="$(this).parent().bPopup().close(); return true;" />
    <div class="error" style="display:none;"></div>

    <input type="hidden" id="f_lot_id" value=""/>
    <div id="lbl2_lot_id" class="font-weight-style list-mes-style" >
		Lot: <span id="f_lot_code" class="label-lot-code" ></span>
		<span id="f_message" class="label-title-popup" ></span>
    </div>
	<input type="button" id="btn_nouveau_message" onclick="showFormMessage()" class="classic-button" value="Nouveau message"/>

    <!--table debut-->

    <div class="datatable-container-message" >
        <table cellpadding='0' cellspacing='0' border='0' class='display font-weight-style' id='message_list' >
            <thead>
                <tr>
                    <th id="message_user_id"></th>
                    <th id="objet">Objet</th>
                    <th id="datetime_creation">Date création</th>
                    <th id="createur_id">Créateur</th>
                    <th id="etat" style="width: 66px;">Etat</th>

                </tr>
            </thead>

            <tbody>
            </tbody>

        </table>

    </div>


    <!--table fin-->

</div>
	<!-- lecture d'un message -->
<div id="lecture-message" class="classic-form message-ecrire-form"  style="display:none;">
	<img src="<?= URL::site('public/img/close.png'); ?>" class="img-close-popup" onClick="$(this).parent().bPopup().close(); return true;" />
    <div class="error" style="display:none;"></div>

    <input type="hidden" id="ml_lot_id" value=""/>
    <div id="lbl2_lot_id" class="font-weight-style lect-mes-style" >
		Lot: <span id="ml_lot_code" class="label-lot-code" ></span>
		<span id="ml_message" class="label-title-popup" ></span>
    </div>

	<div class="lecture_message">
		<div class="lecture_message_content style-police">
			<div id="objet_message">
				<label>Objet: </label><span></span>
			</div>
			<div id="texte_message">
				<p></p>
			</div>
			<div id="lupar">
				<label></label>
			</div>
		</div>
	</div>
</div>
	<!-- ecrire un message -->
<div id="ecrire-message" class="classic-form message-ecrire-form2" style="display:none;">
    <img src="<?= URL::site('public/img/close.png'); ?>" class="img-close-popup" onClick="$(this).parent().bPopup().close(); return true;" />
    <div class="error" style="display:none;"></div>

    <input type="hidden" id="m_lot_id" value=""/>
    <div id="lbl2_lot_id" class="font-weight-style ecr-mes-style" >
		Lot: <span id="m_lot_code" class="label-lot-code" ></span>
		<span id="m_message" class="label-title-popup" ></span>
    </div>

	<div class="form_message">


		<div class="form-message-margin" >
			<label for="lbl_message_objet" class="users" >Objet<font class="mandatory">*</font></label>
			<input id="message_objet" class="classic-input f_message" value=""/>
		</div>
		<div class="form-message-margin" >
			<label for="lbl_message_texte" class="users" >Texte<font class="mandatory">*</font></label>
			<textarea rows="5" id="message_texte" class="classic-input f_message" value=""/></textarea>
		</div>
		<div class="form-message-margin">
			<label for="lbl_message_texte" class="users" >Utilisateur/Destinataire<font class="mandatory">*</font></label>
			<select multiple="multiple" class="classic-input f_message2" name="f_data_users[]" id="f_data_users">
			</select>
		</div>
		<br>

		<span class="send-btn-right">
			<input type="button" id="btn_insert" class="classic-button" onclick="createMessage();" value="Envoyer" />&nbsp;
		</span>
	</div>

</div>
	<!-- fin ecrire un message -->
	<!-- Avancement etape lot -->
<div id="etape_lot_form" class="classic-form"  style="display:none;">
	<img src="<?= URL::site('public/img/close.png'); ?>" class="img-close-popup" onClick="$(this).parent().bPopup().close(); return true;" />
    <div class="error" style="display:none;"></div>

	<input type="hidden" id="e_lot_id" value=""/>
	<div id="lbl_lot_id" class="font-weight-style etp-lot-width" >
		Lot: <span id="e_lot_code" class="label-lot-code" ></span>
		<span id="f_avancement" class="label-title-popup" ></span>
    </div>

    <hr id="horizontal-line">

	<div class="form-etape-lot" >
		<div class="slider-container">	
			<div id='slider-content'>
			</div>
		</div>

		<div class="slider" >
			<div id="legende-etape">
			</div>
			<?php
			if($data_role_act != '6' && $data_role_act != '3'){
			?>
				<input type="button" class="classic-button" id="btn_maj" value="Mise à jour" />
			<?php
			}else{
			?>
				<input type="hidden" id="btn_maj" value="" />
			<?php
			}
			?>
		</div>
	</div>
</div>
<!-- Avancement global -->
<div id="avancement-global-form" class="classic-form"  style="display:none;">
	<img src="<?= URL::site('public/img/close.png'); ?>" class="img-close-popup" onClick="$(this).parent().bPopup().close(); return true;" />
    <div class="error" style="display:none;"></div>

	<div id="lbl_lot_id" class="font-weight-style avg-width" >
		<span id="f_avancement" class="label-title-popup" >Avancement global</span>
    </div>
	<div class="avancement-container">
		<div id="avancement-content">
		</div>
	</div>
</div>
<!--POPUP fin-->

<div class="classic-form" id="updatelot_form" style="display:none;">
	<img src="<?= URL::site('public/img/close.png'); ?>" style="position:absolute;top:2px;right:2px;cursor:pointer;" onClick="$(this).parent().bPopup().close(); return true;" />
	<input type="hidden" id="lot_identifiant">

	<div id="lot-update-panel-libelle" class="font-weight-style bandeau-libelle">
		Lot : <span id="upload_lot_code" class="label-lot-code"></span>
		<span class="label-title-popup">Mise à jour de lot</span>
	</div>
    <br>
    <!--<span class="btn fileinput-button classic-input">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Sélectionner un ou plusieurs fichiers zip (taille max: 64Mo)</span>
        <input id="fileupload" type="file" name="lot" onclick="before_upload()">

    </span>
    <br>
    <br>
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>-->
	<div class="updatelot_form-container">
		<div id="uploader" >
		</div>
		<div id="loading_data" style="display: none;margin: 5px auto;position:relative;width:600px;">
			<img src="<?= URL::base() . 'public/img/ajax_loader.gif'; ?>" /><span id="id_traitement" style='position:absolute;top:8px;padding-left:5px;font-size:11px;'/>
		</div>
		<div id="files" class="files" style="margin-left: 10px;"></div>
		<br>
	</div>
</div>
