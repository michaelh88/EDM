<div class="horiz-grad-main" style="overflow:hidden; position:relative;">

  <div style="height:65px;">

    <a style="float:left;position:relative;top:8px;left:8px;" href="<?= URL::site('/'); ?>"><img title="Page d'accueil" width="52" height="55" src="<?= URL::base() . 'public/img/LogoFTHM.png';?>"></a>

    <div style="float:right;">
      <span style="position:absolute;right:90px;top:6px;" class="header-text">
	<span id="delay" style="float:left;margin-right:80px;cursor:pointer;display:none;" onClick="koCountClick();">
	  <img style="float:left;" src="<?= URL::site('public/img/mail.png'); ?>">
	  <span id="kocount-text" style="position:relative;top:23px;font-size:23px;"></span>
	</span>
	<span style="float:left;margin-right:80px;cursor:pointer;display:none;" id="alerts" onClick="alertsClick();">
	  <img style="float:left;" src="<?= URL::site('public/img/warning.png'); ?>">
	  <span id="alerts-text" style="position:relative;top:21px;font-size:23px;"></span>
	</span>
	<span style="float:right;"><?= $msg_welcome ?></span>
      </span>

      <a style="position:absolute;top:50%;margin-top:-15px;right:10px;" href="<?= URL::site('session/logout'); ?>"><img height="30" width="30" title="Déconnexion" src="<?= URL::base() . 'public/img/logout.png';?>"></a>
    </div>

  </div>
</div>

<div id="alerts-box">
</div>
<div id="delay-box">
</div>
