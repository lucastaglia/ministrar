<?
session_start();


//verifica se já foi instalado...
if(file_exists('../config.php')){
  
  if(!isset($_SESSION['installStatus'])){
    header('LOCATION: ../index.php');  
  }
}

//includes necessários..
include('../cms/functions/nbr.string.php');


function getValue($name, $val = null){
  
  if(isset($_SESSION['installPOST'][$name]))
    return $_SESSION['installPOST'][$name];
  else
    return $val;
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ministrador2 CMS</title>
<link href="stylesheets/reset.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/base.css" rel="stylesheet" type="text/css" />

<script src="./javascripts/jquery.js" type="text/javascript"></script>
<script src="./javascripts/base.js" type="text/javascript"></script>
</head>

<body>

  <img src="images/logo.jpg" width="532" height="133" id="logo" />

<?
if(!isset($_SESSION['installStatus'])){
  
?>
  
  
	<p>Olá. O CMS já está quase pronto pra você usar. Somente preencha algumas informações abaixo para que possamos fazer as instalações necessárias para o funcionamento do CMS. É bem simples e intuitivo, mas caso necessite de alguma ajuda entra em contato com nossa equipe de suporte.</p>
  
	<?
	if(isset($_SESSION['installERRO'])){
	?>
	<div id="erro"><b>Ops! </b><?= $_SESSION['installERRO']; ?></div>
	<?
	}
	?>
  <h2>Configurações de diretório</h2>
  <form action="post.php" method="POST">
  <div class="linha">
    <label>Caminho físico do site</label>
    <?
    
    $sitePath =  $_SERVER["SCRIPT_FILENAME"];
    $sitePath = str_replace('install/index.php', null, $sitePath); //retira a sobra da página atual
    
    ?>
    <input type="text" name="sitepath" class="texto" value="<?= getValue('sitepath', $sitePath) ?>" />
  </div>
  
  <div class="linha">
    <label>Url do site</label>
    <?
    $siteUrl = $_SERVER['SERVER_NAME'] . $_SERVER ['REQUEST_URI'];
    $siteUrl = str_replace('install/index.php', null, $siteUrl); //retira a sobra da página atual    
    $siteUrl = 'http://' . $siteUrl;
    ?>
    <input type="text" name="siteurl" class="texto" value="<?= getValue('siteurl', $siteUrl); ?>" required/>
  </div>
  
  <div class="linha">
    <label>Url do Painel de Administração</label>
    <input type="text" name="adminurl" class="texto" value="<?= getValue('adminurl', $siteUrl . 'cms/admin/'); ?>" required/>
  </div>  
  
  <div class="linha">
    <label>Chave de Codificação</label>
    <input type="text" name="sitekey" class="texto" value="<?= getValue('sitekey', createKey()); ?>" required/>
  </div> 
  <p style="text-align: center;">Obs.:Esta Chave de Codificação será usada para registrar sessões e cockies.</p>


  <h2>Informações do Site</h2>
  
  <div class="linha">
    <label>Título</label>
    <input type="text" name="sitetitulo" class="texto" value="<?= getValue('sitetitulo', 'Título do meu site'); ?>" required/>
  </div>       
  
  <div class="linha">
    <label>Descrição</label>
    <input type="text" name="sitedescricao" class="texto" value="<?= getValue('sitedescricao', 'Descrição do meu site')?>" required/>
  </div>       

  <h2>Configurações de Banco de Dados</h2>
  
  <div class="linha">
    <label>Link de Host</label>
    <input type="text" name="dbhost" class="texto" value="<?= getValue('dbhost', 'localhost'); ?>" required/>
  </div>       
  
  <div class="linha">
    <label>Nome do Database</label>
    <input type="text" name="dbname" class="texto" value="<?= getValue('dbname')?>" required/>
  </div>         
  
  
  <div class="linha">
    <label>Nome do Usuário</label>
    <input type="text" name="dbuser" class="texto" value="<?= getValue('dbuser'); ?>" required/>
  </div>         

  
  <div class="linha">
    <label>Senha</label>
    <input type="password" name="dbpass" class="texto" value="<?= getValue('dbpass'); ?>" required/>
  </div>   


  <h2>Configurações de E-mail</h2>
  
  <div class="linha">
    <label>Nome do Remetente</label>
    <input type="text" name="emailnomeremetente" class="texto" value="<?= getValue('emailnomeremetente'); ?>" required/>
  </div>  

  
  <div class="linha">
    <label>E-mail do Remetente</label>
    <input type="text" name="emailremetente" class="texto" value="<?= getValue('emailremetente'); ?>" required/>
  </div>    

  
  <div class="linha">
    <label>Forma de Envio</label>
			<div class="box" style="height: 65px;">
        <input type="radio" class="emailenvio" name="emailenvio" value="mail" <?= (getValue('emailenvio', 'mail') == 'mail')?'checked':null; ?>>Utilizando mail()<br>
        <input type="radio" class="emailenvio" name="emailenvio" value="smtp" <?= (getValue('emailenvio') == 'smtp')?'checked':null; ?>>Por servidor SMTP
			</div>      
  </div>    
	<div style="clear: both"></div>
  
	<div id="grupoSMTP" style="display:<?= (getValue('emailenvio') == 'smtp')?'block':'none'; ?>;">
    <div class="linha">
      <label>Host de SMTP</label>
      <input type="text" name="emailsmtphost" class="texto" value="<?= getValue('emailsmtphost'); ?>" />
    </div>    
  
    
    <div class="linha">
      <label>Usuário </label>
      <input type="text" name="emailsmtpusuario" class="texto" value="<?= getValue('emailsmtpusuario'); ?>" />
    </div>    
  
    
    <div class="linha">
      <label>Senha</label>
      <input type="text" name="emailsmtpsenha" class="texto" value="<?= getValue('emailsmtpsenha'); ?>" />
    </div>    
  
    
    <div class="linha">
      <label>Porta</label>
      <input type="text" name="emailsmtpporta" class="texto" value="<?= getValue('emailsmtpporta'); ?>" />
    </div>    
  
    
    <div class="linha">
      <label>Segurança</label>  
  			<div class="box" style="height: 93px;">
          <input type="radio" name="emailsmtpseguranca" value="" <?= (getValue('emailsmtpseguranca', '') == '')?'checked':null; ?>>Nenhuma<br>
          <input type="radio" name="emailsmtpseguranca" value="TLS" <?= (getValue('emailsmtpseguranca') == 'TLS')?'checked':null; ?>>TLS<br />
          <input type="radio" name="emailsmtpseguranca" value="SSL" <?= (getValue('emailsmtpseguranca') == 'SSL')?'checked':null; ?>>SSL<br>
  			</div>      
    </div>  

  </div>
<div style="clear: both"></div>   

<h2>Diretórios de uso do CMS</h2>
<p>O instalador verificará e caso ainda não exista, estará criando os seguintes diretórios com as seguintes permissões:  </p>
  <ul>
  	<li>./cms/<strong>cache</strong> (permissão 777)</li>
  	<li>./cms/<strong>temp</strong> (permissão 777)</li>  
  	<li>./site/<strong>uploads</strong> (permissão 777)</li>      
  	<li>./site/uploads/<strong>ckeditor</strong> (permissão 777)</li>          
  </ul>
  
  <input type="submit" name="submit" id="submit" value="Instalar" />
  </form>
  
  
<?
} else {
?>

<h2>Parabéns! Instalação concluída.</h2>
<p>Wow! O CMS Ministrar já está instalado pronto para você utilizá-lo e fazer seu site.</p>
<p>Visite o painel de Administração pela senha de teste abaixo. Não esqueça de alterar esta senha.</p>
<ul>
  <li><b>E-mail:</b> teste@teste.com.br</li>
  <li><b>Senha</b>: teste</li>
</ul>

<p>Para onde você deseja ir agora?</p>
<ul>
<li><a href="<?= $_SESSION['installPOST']["siteurl"]; ?>">Ir para o site.</a></li>
<li><a href="<?= $_SESSION['installPOST']["adminurl"]; ?>">Ir para o Painel Administrativo.</a></li>
</ul>
<?

 //Limpa sessão da mensagem de "Concluido"...
  unset($_SESSION['installStatus']);

}
?>  
</body>
</html>
