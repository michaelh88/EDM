$(document).ready(function(){$("input#username").focus()});function alertEmptyUsername(a){showError("Veuillez d'abord saisir votre nom d'utilisateur",function(){a.css("border","1px solid red");a.focus()})}function goToPasswordRecovery(){var a=$("input#username"),c=$.trim(a.val());""==c?alertEmptyUsername(a):$.post(loginSetUserURL,{username:c},function(b){b=parseInt(b);1==b?alertEmptyUsername(a):0==b&&(window.location.href=lostPasswordURL)})};