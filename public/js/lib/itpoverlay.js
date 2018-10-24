/*
      http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/
function ItpOverlay(c){this.id=c;this.show=function(b){b&&(this.id=b);b=document.getElementById(this.id);var a=document.createElement("div");a.setAttribute("id","itp_overlay");a.setAttribute("class","black_overlay");a.style.display="block";b.appendChild(a);a=document.createElement("div");a.setAttribute("id","loading");a.setAttribute("class","loading");a.style.display="block";b.appendChild(a)};this.hide=function(b){b&&(this.id=b);b=document.getElementById(this.id);var a=document.getElementById("loading");
b.removeChild(a);a=document.getElementById("itp_overlay");b.removeChild(a)}};