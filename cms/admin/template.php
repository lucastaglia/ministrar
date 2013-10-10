<?
//Módulo e Pasta aberta..
if($hub->ExistParam('_moduleID')){
  $moduleObj = nbrModule::LoadModule($hub->GetParam('_moduleID'));
  $folderObj = LoadRecord('sysModuleFolders', $hub->GetParam('_folderID'));
}
//Verifica segurança..
$security->SecurityCheck();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ministrar2 CMS</title>
<meta name="author" content="Nova Brazil Agência Interativa">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<link REL="SHORTCUT icon" HREF="<?= $cms->GetRootUrl()?>favicon.ico">

<!-- Estilos -->
<link href="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.multiselect/common.css" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.multiselect/ui.multiselect.css" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetAdminStyleSheetUrl(); ?>master.css" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetAdminStyleSheetUrl(); ?>ui.css" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.ui/blitzer/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.alert/nbr.jquery.alerts.css" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery-tooltip/jquery.tooltip.css" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" />

<!-- Plugins Jquery -->
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.ui/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.multiselect/ui.multiselect.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.validate/jquery.validate.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.alert/jquery.alerts.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery-tooltip/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.maskedinput/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.autonumeric/autoNumeric-1.5.4.js" type="text/javascript"></script>
<? /* ?><script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.fileupload/jquery.fileupload.js" type="text/javascript"></script><? */ ?>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>jquery.fancybox/jquery.fancybox-1.3.4.js" type="text/javascript"></script>

<!-- Scripts -->
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>cms.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>box.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>toolbar.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>grid.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>form.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>site.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>mousetrap.js" type="text/javascript"></script>

<script src="<?= $cms->GetAdminJavaScriptUrl(); ?>ui.js" type="text/javascript"></script>

<script type="text/javascript">

/** Variáries Usadas no Site **/
var admin_url = '<?= $GLOBALS['ADMIN_URL'] ?>';
var admin_page_url = '<?= $GLOBALS['ADMIN_PAGES_URL'] ?>';
var admin_javascript_url = '<?= $GLOBALS['ADMIN_JAVASCRIPT_URL'] ?>';

</script>
</head>
<body>
<div id="topo">
  <div id="logo"><a href="<?= $ADMIN_URL; ?>"><img src="<?= $cms->GetAdminImageUrl(); ?>logo-cms.png" width="140" height="37" alt="CMS Ministrar2" /> </a> </div>

  <div class="direita"> <a href="<?= $ROOT_URL; ?>" target="_blank" title="Ver site"> <span id="btn_site"></span> </a> 
  <?
    $hub->SetParam('_script', $ADMIN_PAGES_PATH . 'login.script.logout.php');
  ?>
  <a href="<?= $hub->GetUrl(); ?>" title="Sair"> <span id="btn_sair"></span> </a> 
  </div>
  
  <div id="usuario"> <span id="nome">Olá <?= $security->GetUserName()?></span> <a href="#"><span style="display:none;" id="editarperfil"></span></a> </div>
</div>


<div id="toolbar">

<ul>
<?
//Pega todos os módulos da Aplicação...
$obj_modules = new nbrModules();
$modules = $obj_modules->GetModules();

foreach ($modules as $module) {

  //Verifica se este é o Módulo selecionado e insere a classe.
  $class = ($hub->GetParam('_moduleID') == $module->ID)?' class="selected"':null;
  
  //Limpa Níveis do Hub..
  $hub->ClearHistory();

  //Seta parametros do Módulo... 
  $hub->SetParam('_page', $module->file);
  $hub->SetParam('_moduleID', $module->ID);
  $hub->SetParam('_folderID', $module->folderID);
  $hub->SetParam('_title'   , $module->name);
  $hub->SetParam('_description', 'Módulo ' . $module->name);
  
  //Duplica o último nível no Hub para mais um nível para o link da Pasta..
  $hub->levels[] = $hub->levels[count($hub->levels) -1];
  
  $hub->SetParam('_title', $module->folderName);  
  $hub->SetParam('_description', 'Pasta ' . $module->folderName);  
?>
  <li <?= $class; ?>>
    <a title="<?= $module->description; ?>" href="<?= $hub->GetUrl(); ?>">
      <div class="name" style="background-image:url(<?= $module->iconPath; ?>); ">
        <span><?= $module->name; ?></span>
      </div>
    </a>
  </li>
<?
}
?>  
</ul>
</div>
<div id="escondeToolbar">
  <div id="painel"><a href="javascript:void(0);">mais módulos</a></div>
</div>
<!-- CONTEUDO - INICIO -->
<div id="content">
  <div id="left">
  
<?

//se não tiver Módulo selecionado, não mostra pasta nem relatórios..

if($hub->ExistParam('_moduleID')){

  //Seleciona Pastas..
  $obj_folders = new nbrModuleFolders($hub->GetParam('_moduleID'));
  $folders = $obj_folders->GetFolders();
?>
<ul class="menu">
<?
  $grouper = null;
  foreach ($folders as $folder) {
    
    if($grouper != utf8_encode($folder->Grouper)){
      $grouper =  utf8_encode($folder->Grouper);
      echo('</ul>');
      echo('<h1>' . $grouper . '</h1>');
      echo('<ul class="menu">');
    }
  
    $hub->ClearHistory(1);
  
    $file = $moduleObj->path . $folder->File;
    $hub->SetParam('_page', $file);
    $hub->SetParam('_title', utf8_encode($folder->Name));
    $hub->SetParam('_description', 'Pasta ' . utf8_encode($folder->Name));
    $hub->SetParam('_moduleID', $moduleObj->ID);
    $hub->SetParam('_folderID', $folder->ID);
    $link = $hub->GetUrl();
    
    echo('<li ' . (($hub->GetParam('_folderID') == $folder->ID)?'class="selected"':null) . '>');
    echo('<a href="' . $link . '"><span>' . utf8_encode($folder->Name) . '</span></a>');
    echo('</li>');
    
  }
?>  
</ul>

<?
  $sql = 'SELECT * FROM sysModuleReports';
  $sql .= " WHERE Published = 'Y' AND Module = $moduleObj->ID";
  $sql .= ' ORDER BY Title ASC';
  $relatorios = $db->LoadObjects($sql);
  
  if(count($relatorios) > 0){
?>

<h1 style="margin-top: 20px;">Relatórios</h1>
<ul class="reports">

<?
    foreach ($relatorios as $relatorio) {
      
      $hub->SetParam('_page', $ADMIN_PAGES_PATH . 'reports.php');
      $hub->SetParam('_title', utf8_encode($relatorio->Title));
      $hub->SetParam('_description', 'Emitindo relatório ' . utf8_encode($relatorio->Title));
      $hub->SetParam('_moduleID', $hub->GetParam('_moduleID'));
      $hub->SetParam('_folderID', $hub->GetParam('_folderID'));
      
      $hub->SetParam('reportID', $relatorio->ID);
      $hub->SetParam('reportFile', $moduleObj->path . $relatorio->File);
      $hub->SetParam('reportTitle', utf8_encode($relatorio->Title));
?>
<li><a href="<?= $hub->GetUrl();?>"><?= utf8_encode($relatorio->Title); ?></a></li>
<?
    }
?>
</ul>
<?
  }
}
?>


</div>
  <div class="<?= (($hub->ExistParam('_moduleID'))?'main':'mainFull'); ?>">
    <? include($page); ?>
    <div class="clearcontent"></div>
    </div>
  </div>
  <div style="clear:left"></div>
</div>
<!-- CONTEUDO - FIM -->
<div id="rodape">Este site é administrado pelo CMS Ministrar2, da <a href="http://www.novabrazil.art.br" target="_blank">Nova Brazil Agência Interativa</a>, na <b>versão <?= $cms->GetVersion(); ?></b></div>  
<div id="status"></div>

</body>
</html>