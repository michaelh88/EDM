function showWarning(a,b){$.alert('<img src="'+urlImages+'warning.jpg" class="alerts" /><label class="alerts">'+a+"</label>",b)}function showError(a,b){$.alert('<img src="'+urlImages+'error.png" class="alerts" /><label  class="alerts" style="color: red;">'+a+"</label>",b)}function showInfo(a,b){$.alert('<img src="'+urlImages+'info.png" class="alerts" /><label  class="alerts" style="color: blue;">'+a+"</label>",b)}
function askWarning(a,b,c){$.confirm('<img src="'+urlImages+'warning.jpg" class="alerts" /><label class="alerts">'+a+"</label>",function(a){a?"function"==typeof b&&b():"function"==typeof c&&c()})}function addZeros(a,b){for("number"==typeof a&&(a+="");a.length<b;)a="0"+a;return a}function allowInt(a){(48>a.which||57<a.which)&&(8!=a.which&&0!=a.which)&&a.preventDefault()}
function allowFloat(a,b){(46!=a.which||-1!=b.indexOf("."))&&((48>a.which||57<a.which)&&8!=a.which&&0!=a.which)&&a.preventDefault()};