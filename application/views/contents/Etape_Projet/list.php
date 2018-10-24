<script type='text/javascript'>
    var etape_projetAjaxBrowseURL = '<?= URL::site('etape_projet/ajax_browse'); ?>',
    etape_projetAjaxGetURL = '<?= URL::site('etape_projet/ajax_etapeProjet_get') ?>/',
    etape_projetAjaxDeleteURL = '<?= URL::site('etape_projet/ajax_etapeProjet_delete'); ?>',
    etape_projetPostInsertURL = '<?= URL::site('etape_projet/post_etapeProjet_insert'); ?>',
    getProjetAjaxGetURL = '<?= URL::site('etape_projet/ajax_getProjet_get'); ?>/';
</script>

<div class="page-title">Etape - Liste des associations Projet-Etape</div>

<div class="message" style="display:none;"></div>

<div class="datatable-container">

    <div style="margin-bottom:10px;" ><input type="button" value="Associer projet-étape " onclick="showEtape_ProjetForm();"></div>
    <table cellpadding='0' cellspacing='0' border='0' class='display' id='etape_projet_list' style='font-size: 0.9em;'>
        <thead>
            <tr>
                <th></th>
                <th>Projet</th>
                <th>Etape</th>
                <th>Ordre</th>
                <th>Delai</th>
            </tr>
        </thead>

        <tbody>
        </tbody>

    </table>

</div>

<div id="etape_projet-form" class="classic-form" style="width:580px;">
    <img src="<?= URL::site('public/img/close.png'); ?>" style="position:absolute;top:2px;right:2px;cursor:pointer;" onClick="$(this).parent().bPopup().close(); return true;" />
    <div class="error" style="display:none;"></div>

    <input type="hidden" id="etape_projet_id" value=""/>

    <div style="margin-top:20px;">
      <label for="etape_projet_projet_id" class="users">Projet</label>
      <select id="etape_projet_projet_id" name="etape_projet_projet_id" style="width:250px;">
          <option value="">--Projet--</option>
      </select>
    </div>
   

    <div style="margin-top:20px; ">
      <label for="etape_projet_etape_id" class="users">Etape</label>
      <select multiple id="etape_projet_etape_id" name="etape_projet_etape_id" style="width:250px;">
          
      </select>
    </div>


    <div style="margin-top:20px;">
        <label for="etape_projet_ordre" class="users" >Ordre<font class="mandatory">*</font></label>
        <input id="etape_projet_ordre"  class="users" value="" />
    </div>

    <div style="margin-top:20px;">
        <label for="etape_projet_delai" class="users" >Delai</label>
        <input id="etape_projet_delai"  class="users" value="" />
    </div>
    <hr id="horizontal-line">
    <br>

    <span style="float:right;">
        <input type="button" id="btn_insert" onclick="insertEtape();" value="Valider" />&nbsp;
        <input type="button" id="btn_delete"  onclick="deleteClick();" value="Supprimer" />&nbsp;
        <input type="button" onclick="$('div#etape-form').bPopup().close();" value="Annuler" />
    </span>
</div>


