<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= ($page->title . ' - ' . $site->title); ?></title>

<!-- Arquivos CSS do Template -->
<?
$page->addFileStylesheet('reset.css', true);
$page->addFileStylesheet('base.css', true);
?>


<?
//Imprime cabeçalho automatizado do CMS
$page->printHeader(); 
?>

<script type="text/javascript">
	/** Variáries Usadas no Site **/
	var site_url  = '<?= $GLOBALS['ROOT_URL'] ?>';
	var link_url  = '<?= $GLOBALS['ROOT_URL'] . $GLOBALS['LINK_PREFIX'] ?>';
	var theme_url = '<?= $cms->GetThemeUrl(); ?>';
	var pagename = '<?= $router->getPage(); ?>';
</script>
</head>

<body>

<div id="header">
  <a href="#">
    <img src="<?= $cms->GetFrontImageUrl(); ?>logo.png" width="266" height="31" id="logo" />
  </a>
</div>

<ul id="menu">
  <li><a href="<?= $router->GetPageIndex(); ?>">Home</a></li>
  <li><a href="<?= $router->GetLink('quem-somos'); ?>">Quem somos</a></li>
  <li><a href="<?= $router->GetLink('contato'); ?>">Fale Conosco</a></li>  
</ul>

<div id="main">
	<!-- CONTEUDO - INICIO -->
    <? include($FRONT_PAGES_PATH . $fileHtml); ?>
	<!-- CONTEUDO - FIM -->   
</div>

<div id="footer">Copyright 2013 - <?= __('Este site utiliza o CMS Ministrar2'); ?></div>

</body>
</html>
