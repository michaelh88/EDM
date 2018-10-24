<script type='text/javascript'>
    var lotAjaxExportStatistiqueURL = '<?= URL::site('Lot/ajax_export_statistique'); ?>',
	lotAjaxGetJsonURL = '<?= URL::site('script/exportation.php'); ?>',
	id_user = '<?= $id_user ?>';
	
</script>

<div class="page-title">Export statistique</div>
<div class="message" style="display:none;"></div>
<!--filtre debut-->
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
			
			<div class="div_filtre">
				<div class="div_filtre_label">
					<div><label class="label_filtre" >Granularité</label></div>
				</div>
				<div class="div_filtre_date">
					<?php echo Form::select('data_granularite', $data_granularite, null, array( 'class' => 'classic-input select_filtre', 'id' => 'data_granularite' )); ?>
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="div_filtre div_filtre1" style="height: 60px;">
				<div class="div_filtre_label">
					<div><label class="label_filtre">Plage de date</label></div>
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
			echo Form::button('export', 'Exporter en Excel', array('id' => 'btn_export', 'type' => 'button', 'class'=>'classic-button btn-lot-action '));
			?>
		</div>
		<div class="div_filtre_btn div_filtre_fin">
			<?php
			echo Form::button('reinitialiser', 'Réinitialiser le filtre', array('id' => 'btn_reinitialiser', 'type' => 'button', 'class'=>'classic-button btn-lot-action ', 'onclick' => 'this.form.reset()'));
			?>
		</div>
		
	</form>
	
	<div id="loading_data" style="display: none;margin: 5px auto;position:relative;width:31px;">
        <img src="<?= URL::base() . 'public/img/ajax_loader.gif'; ?>" style="margin-top: -3px;" />
    </div>
</div>
		
    
<!--filtre fin-->
