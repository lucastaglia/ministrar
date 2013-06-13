<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= ($page->title . ' - ' . $site->title); ?></title>

<? 

$page->addFileImageSrc($cms->GetFrontImageUrl() . 'facebook.jpg');
$page->printHeader(); 

?>

<link href="<?= $cms->GetFrontStyleSheetUrl(); ?>reset.css?vs=?vs=<?= $cms->GetVersion(); ?>" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetFrontStyleSheetUrl(); ?>base.css?vs=<?= $cms->GetVersion(); ?>" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetFrontStyleSheetUrl(); ?>animations.css?vs=<?= $cms->GetVersion(); ?>" rel="stylesheet" type="text/css" />
<link href="<?= $cms->GetFrontJavaScriptUrl(); ?>jquery.alerts/jquery.alerts.css?vs=<?= $cms->GetVersion(); ?>" rel="stylesheet" type="text/css" />

<link href="<?= $cms->GetFrontStyleSheetUrl(); ?>fonts/CreteRoundItalic/stylesheet.css?vs=<?= $cms->GetVersion(); ?>" rel="stylesheet" type="text/css" />


<script src="<?= $cms->GetFrontJavaScriptUrl(); ?>jquery.js?vs=<?= $cms->GetVersion(); ?>" type="text/javascript"></script>
<script src="<?= $cms->GetFrontJavaScriptUrl(); ?>jquery.easing.js?vs=<?= $cms->GetVersion(); ?>" type="text/javascript"></script>
<script src="<?= $cms->GetFrontJavaScriptUrl(); ?>jquery.cycle.all.js?vs=<?= $cms->GetVersion(); ?>" type="text/javascript"></script>
<script src="<?= $cms->GetFrontJavaScriptUrl(); ?>base.js?vs=<?= $cms->GetVersion(); ?>" type="text/javascript"></script>
<script src="<?= $cms->GetFrontJavaScriptUrl(); ?>scrolltotop.js?vs=<?= $cms->GetVersion(); ?>" type="text/javascript"></script>
<script src="<?= $cms->GetFrontJavaScriptUrl(); ?>jquery.maskedinput.js?vs=<?= $cms->GetVersion(); ?>" type="text/javascript"></script>
<script src="<?= $cms->GetFrontJavaScriptUrl(); ?>jquery.alerts/jquery.alerts.js?vs=<?= $cms->GetVersion(); ?>" type="text/javascript"></script>
<script src="<?= $cms->GetFrontJavaScriptUrl(); ?>jquery.validate.min.js?vs=<?= $cms->GetVersion(); ?>" type="text/javascript"></script>



<script type="text/javascript">
	/** Variáries Usadas no Site **/
	var site_url  = '<?= $GLOBALS['ROOT_URL'] ?>';
	var link_url  = '<?= $GLOBALS['ROOT_URL'] . $GLOBALS['LINK_PREFIX'] ?>';
	var theme_url = '<?= $cms->GetThemeUrl(); ?>';
	var pagename = '<?= $router->getPage(); ?>';
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-267618-19']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body class="flutuationBg">

<img id="compartilhe" src="<?= $cms->GetFrontImageUrl(); ?>compartilhe.png" width="66" height="67">
<ul id="social">
  <li><a href="https://www.facebook.com/novabrazil" target="_blank" title="Curta nossa FanPage"><img src="<?= $cms->GetFrontImageUrl(); ?>btn_facebook.png" width="27" height="32" class="alphaOut"></a></li>
  <li><a href="https://twitter.com/novabrazil" target="_blank" title="Siga nosso Twitter"><img src="<?= $cms->GetFrontImageUrl(); ?>btn_twitter.png" width="27" height="32" class="alphaOut"></a></li>
</ul>

    <div id="boxHeader">
      <a id="home" href="<?= $router->GetLink('home'); ?>">
        <img id="logo" src="<?= $cms->GetFrontImageUrl(); ?>logo.png" width="228" height="95" class="zoomIn" />
      </a>
      
      <ul id="menu">
        <li><a id="home" href="<?= $router->GetLink('home'); ?>">Home</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#quem-somos'); ?>" title="Quem é a Nova Brazil?">Quem Somos</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#o-que-fazemos'); ?>" title="O que a Nova Brazil faz?">O que fazemos</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#quem-ja-fez'); ?>" title="Quem são sos clientes felizes da Nova Brazil?">Quem já fez</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#blog'); ?>">Blog</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#contato'); ?>" title="Entre em contato com a Nova Brazil">Contato</a></li>
       </ul>
    </div>
    
    <div id="header2">
      <div id="box">
        <a id="home" href="<?= $router->GetLink('home'); ?>">
          <img id="logo" class="zoomIn" src="<?= $cms->GetFrontImageUrl(); ?>header2_logo.jpg" width="46" height="44">
        </a>

        <!-- Cópia do HTML do Menu oficial -->
      <ul id="menu">
        <li><a id="home" href="<?= $router->GetLink('home'); ?>">Home</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#quem-somos'); ?>" title="Quem é a Nova Brazil?">Quem Somos</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#o-que-fazemos'); ?>" title="O que a Nova Brazil faz?">O que fazemos</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#quem-ja-fez'); ?>" title="Quem são sos clientes felizes da Nova Brazil?">Quem já fez</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#blog'); ?>">Blog</a></li>
        <li><a class="scroll" href="<?= $router->GetLink('home#contato'); ?>" title="Entre em contato com a Nova Brazil">Contato</a></li>
      </ul>
        
      </div>
    </div>
    
	<!-- CONTEUDO - INICIO -->
    <? include($FRONT_PAGES_PATH . $fileHtml); ?>
	<!-- CONTEUDO - FIM -->   
  
        <div id="contato" class="ancora"></div>
    <div id="boxFooter">
      <div class="miolo">
        <h1 class="tongtong">Contato</h1>
        
        <div id="formulario">
          <form action="#" method="POST" id="contato" name="contato">
          
            <div class="linha">
              <label>Nome</label>
              <input name="nome" id="nome" class="texto">
            </div>

            <div class="linha" style="width: 249px; float: left; margin-right: 11px">
              <label>E-mail</label>
              <input name="email" id="email" class="texto">
            </div>

            <div class="linha" style="width: 181px; float: left;">
              <label>Telefone</label>
              <input name="telefone" id="telefone" class="texto">
            </div> 
                       
            <div class="linha" style="height: 160px; clear: both;">
              <label>Mensagem</label>
              <textarea id="mensagem" name="mensagem"></textarea>
            </div> 

            <div class="linha" style="text-align: right;">
              <input type="submit" name="enviar" id="enviar" value="Enviar Mensagem">
            </div>

          </form>
        </div>
        
        <div id="endereco">
         <img src="<?= $cms->GetFrontImageUrl(); ?>contato.gif" width="375" height="216" style="margin-left: 30px; margin-top: 0;">
        </div>
      </div>
      
      <div class="clearboth"></div>
	  <div id="copy">Copyright 2011 - <?= date('Y'); ?> - Nova Brazil Agência Interativa.</div>
    </div>

<div id="back-top">
  <a title="Clique aqui para voltar ao todo do site" href="<?= $router->GetUrl(); ?>"><img src="<?= $cms->GetFrontImageUrl(); ?>up-arrow.png" /></a>
</div>

</body>
</html>