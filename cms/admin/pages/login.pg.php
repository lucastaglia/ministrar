<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nova Brazil CMS</title>

<link href="<?= $cms->GetAdminStyleSheetUrl(); ?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetAdminStyleSheetUrl(); ?>login.css" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.ui//nbrazil-cms/jquery-ui-1.8.2.custom.css" rel="stylesheet" type="text/css" />

<!-- Plugins Jquery -->
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.ui/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.ui/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>

</head>
<body>

<div id="box">
  <div id="logo"></div>
  <div id="painel">
  <?
  $hub->SetParam('_script', $ADMIN_PAGES_PATH . 'login.script.login.php');
  ?>
    <form id="login" action="<?= $hub->GetUrl() ?>" enctype="multipart/form-data" method="post">
        <input name="mail" type="text" value="<?= $hub->GetParam('mail'); ?>" />
        <input name="password" maxlength="20" type="password" />
      <input name="" id="btn" type="image" src="images/login_btn_entrar.png" />
    </form>
    <?
    if($hub->ExistParam('msg')){
    ?>
    <span id="msg"><?= $hub->GetParam('msg'); ?></span>
    <?
    }
    ?>
  </div>
</div>

<div id="rodape">Este site é administrado pelo CMS Ministrar2, da <a href="http://www.novabrazil.art.br" target="_blank">Nova Brazil Agência Interativa</a>, na <b>versão <?= $cms->GetVersion(); ?></b></div>  
</body>
</html>