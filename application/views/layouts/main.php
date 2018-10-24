<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="description" content="FTHM WEB" />
    <meta name="author" content="fthm" />
    <meta name="copyright" content="Copyright 2015. FTHM" />
    <meta name="language" content="fr-fr" />

    <title><?= $page_title ?></title>

    <?php if (isset($csslib)) foreach ($csslib as $cur_csslib) : ?>
    <link rel="stylesheet" href="<?= URL::base() . 'public/css/lib/'. $cur_csslib . '.css'; ?>" >
    <?php endforeach; ?>

    <?php if (isset($css)) foreach ($css as $cur_css) : ?>
    <link rel="stylesheet" href="<?= URL::base() . 'public/css/contents/'. $cur_css . '.css'; ?>" >
    <?php endforeach; ?>

    <?php if (isset($jslib)) foreach ($jslib as $cur_jslib) : ?>
    <script type="text/javascript" src="<?= URL::base() . 'public/js/lib/'. $cur_jslib . '.js'; ?>" ></script>
    <?php endforeach; ?>

    <?php if (isset($js)) foreach ($js as $cur_js) : ?>
    <script type="text/javascript" src="<?= URL::base() . 'public/js/contents/'. $cur_js . '.js'; ?>" ></script>
    <?php endforeach; ?>

  </head>

  <body>

    <script type="text/javascript">
	var urlImages = '<?= URL::base() . 'public/img/'; ?>',
	  urlFlashPath = '<?= URL::base() . 'public/flash/'; ?>',
	  urlAlertSoundPath = '<?= URL::base() . 'public/sound/alert.mp3'; ?>',
	  urlNotifySoundPath = '<?= URL::base() . 'public/sound/notify.mp3'; ?>',
	  urlGetAlerts = '<?= URL::site('alerts/ajax_getAlerts'); ?>/',
	  urlKoList = '<?= URL::site('lot/list'); ?>',
	  urlLotList = '<?= URL::site('lot/list'); ?>';
    </script>

    <?php if (isset($preJSAction)): ?>
    <script type="text/javascript">
	<?= $preJSAction ?>
    </script>
    <?php endif; ?>

    <div id="header">
      <?= isset($header) ? $header : ''; ?>
    </div>

    <div id="menu">
      <?= isset($menu) ? $menu : ''; ?>
    </div>

    <div id="content">
      <?= isset($content) ? $content : ''; ?>
    </div>

    <div id="footer">
      <?= isset($footer) ? $footer : ''; ?>
    </div>

  </body>

</html>

