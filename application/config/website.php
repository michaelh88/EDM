<?php defined('SYSPATH') or die('No direct script access.');

return array(

  'msg_user_welcome' => '
    <div>
      <label style="font-weight:bold;">%name</label> (<a href="mailto:%email" class="email-user" >%email</a>)
    </div>
    <div style="margin-top:3px;font-size:0.89em;">
      <label style="font-weight:bold;">Rôle:</label> %role
    </div>
    <div style="margin-top:3px;font-size:0.89em;">
      <label style="font-weight:bold;">Dernière connexion:</label> %lastLogin
    </div>',

  'msg_user_alerts' => '%alertsCount alerte(s) à contrôler',

  'url_lot_download' => './misc/download/',
  'url_lot_extract' => './misc/extra/',
  'url_lot_plat' => './misc/plat/',
  'url_lot_temp' => './misc/temp/',
  'url_lot_plat2' => 'misc/plat/',

);
