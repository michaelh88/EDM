<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

  <head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="description" content="FTHM WEB" />
    <meta name="author" content="FTHM" />
    <meta name="copyright" content="Copyright 2015 FTHM" />
    <meta name="language" content="fr-fr" />

    <title><?= $page_title ?></title>

    <link rel="stylesheet" href="<?= URL::base() . 'public/css/contents/common.css'; ?>">

    <link rel="stylesheet" href="<?= URL::base() . 'public/css/contents/Session/login.css'; ?>">

    <script type="text/javascript" src="<?= URL::base() . 'public/js/lib/jquery.min.js'; ?>"></script>
    <script type="text/javascript" src="<?= URL::base() . 'public/js/lib/jstz.min.js'; ?>"></script>
    <script type="text/javascript" src="<?= URL::base() . 'public/js/lib/jquery.msgbox.min.js'?>"></script>

    <script type="text/javascript" src="<?= URL::base() . 'public/js/contents/common.js'; ?>"></script>

    <script type="text/javascript" src="<?= URL::base() . 'public/js/contents/Session/login.js'; ?>"></script>


  </head>

  <body>
    <div id="content">
      <?= $content; ?>
    </div>
  </body>

  <script type="text/javascript">

    var urlImages = '<?= URL::base() . 'public/img/' ?>';

    $(document).ready(function() {

      var timezone = jstz.determine();
      $.post(
	'<?= URL::site('session/setClientTimezoneInSeconds'); ?>',
	{
	  timezone: timezone.name()
	}
      );
    });

  </script>

</html>
