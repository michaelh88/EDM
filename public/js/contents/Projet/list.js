function refresh_fenetre(){oTable.fnDraw(!0)}function tableRowClick(){var e=oTable.fnGetData(this);parseInt(e[0]);var e=parseInt(e[0]),t=$("div#projet-form"),o=null;$.getJSON(projetAjaxGetURL+e,function(e){t.find("input#projet_id").val(e.projet_id),t.find("input#projet_nom_projet").val(e.nom_projet),$("#projet_datetime_creation").text(e.datetime_creation),$("#lbl_projet_datetime_creation").show(),$("div.error").hide(),0==e.canBeDeleted?$("#btn_delete").hide():$("#btn_delete").show()}),t.find("input#projet_id").val(e),t.bPopup({onClose:function(){oTable.fnDraw()}}),o=new ItpOverlay,new Request.HTML({method:"get",onRequest:function(){o.show("projet-form")},onComplete:function(){o.hide("projet-form")}}).send()}function deleteClick(){var e=$("input#projet_nom_projet").val();askWarning("Êtes-vous sûr de vouloir supprimer le projet "+e+"?",function(){var e=$("div#projet-form");projet_id=e.find("input#projet_id").val(),$.get(projetAjaxDeleteURL+"/"+projet_id,null,function(){e.bPopup().close()})})}function showProjetForm(){reInitProjetFields();var e=$("div#projet-form");e.find("input#projet_id").val(""),e.find("input#projet_nom_projet").val(""),e.find("input#projet_datetime_creation").val(""),$("#lbl_projet_datetime_creation").hide(),$("div.error").hide(),e.bPopup({onClose:function(){oTable.fnDraw()}})}function resizeDataTable(){$("div.datatable-container").width($(window).width()-60),oTable.fnAdjustColumnSizing()}function reInitProjetFields(){$("div#projet-form").find("input#projet_nom_projet, input#projet_datetime_creation").css("backgroundColor","#ffffff")}function insertProjet(){var e=$("div#projet-form");reInitProjetFields(),$.post(projetPostInsertURL,{id:e.find("input#projet_id").val(),nom_projet:e.find("input#projet_nom_projet").val(),datetime_creation:e.find("input#projet_datetime_creation").val()},function(e){var t=null,t=$.parseJSON(e);if(0==t.status)$("div.message").html(t.message),$("div.message").show(),$("div#projet-form").bPopup().close();else{switch(t.status){case 2:setFieldInError($("input#projet_nom_projet"))}$("div.error").html(t.message),$("div.error").show()}})}function setFieldInError(e){e.css("backgroundColor","#ff0000"),e.focus()}function chercher(){null!=hdl&&clearTimeout(hdl),t=setTimeout(function(){recherche()},700)}function recherche(){}var oTable=null;$(document).ready(function(){setInterval(refresh_fenetre,3e5),$("div.datatable-container").width($(window).width()-60),oTable=$("#projet_list").dataTable({sAjaxSource:projetAjaxBrowseURL,aoColumnDefs:[{bVisible:!1,bSearchable:!1,aTargets:[0]},{sClass:"center",aTargets:[2]}],fnRowCallback:function(e){$(e).addClass("dt-row-common")},aaSorting:[[1,"asc"]],sScrollY:"300px",sDom:'<"H"Cfr>tS<"F"i>',bDeferRender:!0,bRetrieve:!0,bDestroy:!0,bProcessing:!0,bServerSide:!0,bAutoWidth:!0,bJQueryUI:!0,bStateSave:!1,sScrollX:"98%",sPaginationType:"full_numbers",oColVis:{aiExclude:[0],buttonText:"Afficher / masquer des colonnes",bRestore:!0,sRestore:"Afficher toutes les colonnes"},oLanguage:{oPaginate:{sFirst:"Début",sLast:"Fin",sNext:"Suivant",sPrevious:"Précédent"},sSearch:"Rechercher",sProcessing:"Chargement en cours...",sLengthMenu:'Lignes affichées: <select><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="-1">Toutes</option></select>',sZeroRecords:"Aucun résultat pour cette recherche",sInfo:"Lignes _START_ à _END_ (Total: _TOTAL_)",sInfoFiltered:" - Filtrées parmis _MAX_ lignes",sInfoEmpty:"Aucune donnée à afficher"}});var e=null;$(window).resize(function(){clearTimeout(e),e=setTimeout(resizeDataTable,100)}),$("#projet_list tbody tr").live("click",tableRowClick)});var hdl=null,ifound=0;