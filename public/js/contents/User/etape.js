function change_step_value(){var e=$("#etp_id");$.ajax({url:"/fthm_local/user/ajax_changestep/"+$("#pro_id").val(),type:"get",dataType:"json",success:function(n){e.empty();for(ligne in n)console.log(ligne+"=>"+n[ligne]),e.append('<option value="'+ligne+'">'+n[ligne]+"</option>")}})}function change_user_value(){var e=$("#pro_id");$.ajax({url:"/fthm_local/user/ajax_changeuser/"+$("#utilisateur_id").val(),type:"get",dataType:"json",success:function(n){e.empty();for(ligne in n)console.log(ligne+"=>"+n[ligne]),e.append('<option value="'+ligne+'">'+n[ligne]+"</option>");change_step_value()}})}$(document).ready(function(){change_user_value()});