<script type='text/javascript'>
  var lotImportAjaxBrowseURL = '<?= URL::site('import/ajax_browse'); ?>';  
</script>

<div class="page-title">Lot - Modification lot</div>

<div class="message" style="display:none;"></div>

<div class="datatable-container">
  
  <table cellpadding='0' cellspacing='0' border='0' class='display' id='lot_list' style='font-size: 0.9em;'>
    <thead>
      <tr>
		<th></th>
		<th>Nom zip</th>
		<th>Nom zip original</th>
      </tr>
    </thead>

    <tbody>
    </tbody>

  </table>

</div>



<div class="classic-form" id="updatelot_form" style="display:none;">
	<img src="<?= URL::site('public/img/close.png'); ?>" style="position:absolute;top:2px;right:2px;cursor:pointer;" onClick="$(this).parent().bPopup().close(); return true;" />
	<input type="hidden" id="lot_id">
    <div style="margin-top:10px;">
      <?= Form::label('nom_lot_id', 'Lot', array('class' => 'users')); ?>
	  <span id="spn_nom_lot"></span>
	  <br/>
    </div>
    <br>
    <span class="btn fileinput-button classic-input">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Selectionner le fichier...</span>
        <input id="fileupload" type="file" name="lot" onclick="before_upload()">
		
    </span>
    <br>
    <br>
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <div id="files" class="files"></div>
    <br>
</div>
