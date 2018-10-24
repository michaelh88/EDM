<script type='text/javascript'>
    var projetAjaxBrowseURL = '<?= URL::site('projet/ajax_browse'); ?>',
    projetAjaxGetURL = '<?= URL::site('projet/ajax_projet_get') ?>/',
    projetAjaxDeleteURL = '<?= URL::site('projet/ajax_projet_delete'); ?>',
    projetPostInsertURL = '<?= URL::site('projet/post_projet_insert'); ?>';
</script>

<div class="page-title">Projet - Liste des projets</div>

<div class="message" style="display:none;"></div>

<div class="datatable-container">

    <div style="margin-bottom:10px;" ><input type="button" value="Ajouter un projet" onclick="showProjetForm();"></div>
    <table cellpadding='0' cellspacing='0' border='0' class='display' id='projet_list' style='font-size: 0.9em;'>
        <thead>
            <tr>
                <th></th>
                <th>Nom du projet</th>
                <th>Date de création</th>	
            </tr>
        </thead>

        <tbody>
        </tbody>

    </table>

</div>

<div id="projet-form" class="classic-form" style="width:580px;">
    <img src="<?= URL::site('public/img/close.png'); ?>" style="position:absolute;top:2px;right:2px;cursor:pointer;" onClick="$(this).parent().bPopup().close(); return true;" />
    <div class="error" style="display:none;"></div>

    <input type="hidden" id="projet_id" value=""/>

    <div style="margin-top:20px;">
        <label for="projet_nom_projet" class="users" >Nom du projet<font class="mandatory">*</font></label>
        <input id="projet_nom_projet"  class="users" value="" />
    </div>
 
    <hr id="horizontal-line">
    <div id="lbl_projet_datetime_creation" style="font-size:0.8em;">
      <label for="date_creation" class="users">Date de création:</label>
      <label id="projet_datetime_creation"  text="" style="width:200px;"/>
    </div>
    <br />

    <span style="float:right;">
        <input type="button" id="btn_insert" onclick="insertProjet();" value="Valider" />&nbsp;
        <input type="button" id="btn_delete"  onclick="deleteClick();" value="Supprimer" />&nbsp;
        <input type="button" onclick="$('div#projet-form').bPopup().close();" value="Annuler" />
    </span>
</div>
