<script type='text/javascript'>
    var etapeAjaxBrowseURL = '<?= URL::site('etape/ajax_browse'); ?>',
    etapeAjaxGetURL = '<?= URL::site('etape/ajax_etape_get') ?>/',
    etapeAjaxDeleteURL = '<?= URL::site('etape/ajax_etape_delete'); ?>',
    etapePostInsertURL = '<?= URL::site('etape/post_etape_insert'); ?>';
</script>

<div class="page-title">Etape - Liste des étapes</div>

<div class="message" style="display:none;"></div>

<div class="datatable-container">

    <div style="margin-bottom:10px;" ><input type="button" value="Ajouter un étape" onclick="showEtapeForm();"></div>
    <table cellpadding='0' cellspacing='0' border='0' class='display' id='etape_list' style='font-size: 0.9em;'>
        <thead>
            <tr>
                <th></th>
                <th>Libellé de l'étape</th>
                <th>Par défaut</th>	
            </tr>
        </thead>

        <tbody>
        </tbody>

    </table>

</div>

<div id="etape-form" class="classic-form" style="width:580px;">
    <img src="<?= URL::site('public/img/close.png'); ?>" style="position:absolute;top:2px;right:2px;cursor:pointer;" onClick="$(this).parent().bPopup().close(); return true;" />
    <div class="error" style="display:none;"></div>

    <input type="hidden" id="etape_id" value=""/>

    <div style="margin-top:20px;">
        <label for="etape_libelle" class="users" >Libellé de l'étape<font class="mandatory">*</font></label>
        <input id="etape_libelle"  class="users" value="" />
    </div>
 
    <div style="margin-top:20px;">
      <label for="etape_defaut" class="users">Par défaut:</label>
      <select id="etape_defaut" name="etape_defaut">
          <option value="0">Oui</option>
          <option value="1">Non</option>
      </select>
    </div>
    <br />

    <span style="float:right;">
        <input type="button" id="btn_insert" onclick="insertEtape();" value="Valider" />&nbsp;
        <input type="button" id="btn_delete"  onclick="deleteClick();" value="Supprimer" />&nbsp;
        <input type="button" onclick="$('div#etape-form').bPopup().close();" value="Annuler" />
    </span>
</div>
